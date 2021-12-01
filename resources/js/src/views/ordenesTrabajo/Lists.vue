<template>
<v-row>
    <!-- title -->
    <v-card-text>
        <p class="text-2xl font-weight-semibold text--primary mb-2">Lista de Ordenes</p>
    </v-card-text>
    <!-- lists -->
    <v-col cols="12">
         <vs-table :data="barcos"
         ref="table"
            v-model="selected"
            @selected="editData"
         >
            
            <template slot="thead">
                <vs-th :key="i"
                    v-for="(heading , i ) in header"
                > 
                    {{heading}}
                </vs-th>
            </template>

            <template slot-scope="{data}">
                <vs-tr :data="tr" :key="indextr" v-for="(tr, indextr) in data" >
                <vs-td :data="data[indextr].nome">
                    {{data[indextr].nome}}
                </vs-td>

                <vs-td :data="data[indextr].numero_IMO">
                    {{data[indextr].numero_IMO}}
                </vs-td>

                <vs-td :data="data[indextr].armador">
                    {{data[indextr].armador}}
                </vs-td>

                <vs-td :data="data[indextr].numero_registro">
                    {{data[indextr].numero_registro}}
                </vs-td>
                <vs-td :data="data[indextr].indicativo_chamada">
                    {{data[indextr].indicativo_chamada}}
                </vs-td>
                <vs-td :data="data[indextr].ano_construcao">
                    {{data[indextr].ano_construcao}}
                </vs-td>
                <vs-td :data="data[indextr].numero_construcao">
                    {{data[indextr].numero_construcao}}
                </vs-td>
                <vs-td :data="data[indextr].created_at">
                    {{dateFormat(data[indextr].created_at)}}
                </vs-td>
                <vs-td>
                    <v-icon size="30" @click.stop="openDialogo(tr.id)">
                        {{ icons.mdiAlertDecagramOutline }}
                    </v-icon>
                    
                </vs-td>
                <vs-td >
                    <v-icon size="30" @click.stop="openConfirm(tr.id)">
                        {{ icons.mdiDeleteOutline }}
                    </v-icon>
                </vs-td>
               
                </vs-tr>
            </template>
        </vs-table>

    </v-col>
   
</v-row>
</template>

<script>
import { RepositoryFactory } from '@/repositories/RepositoryFactory';
const OrdenesRepository = RepositoryFactory.get('ordenes');

import {
    mdiDeleteOutline,
    mdiAlertDecagramOutline
} from '@mdi/js';

import vSelect from 'vue-select';
import moment from 'moment';
import Datepicker from 'vuejs-datepicker';

export default {
    components: {
        vSelect,
        Datepicker
    },
    data() {
      return {
        header: [
            'Nome',
            'Numero IMO',
            'Armador',
            'Número de registro',
            'Indicativo de chamada',
            'Ano de construção',
            'N de construcción',
            'Createad',
            ' ',
            ' '
        ],
        icons:{
            mdiDeleteOutline,
            mdiAlertDecagramOutline
        },
        ordenes:[],
      }
    },
    computed: {
        
    },
    methods: {
        
        /* obtener listado de ordenes */
        async getBarcos(){
            let {data} = await OrdenesRepository.getOrdenes();
            this.ordenes(data);
        },    
        async repositoryCall(type, id, repository, data = {}) {
            this.$vs.loading();
        
            let response = await type[repository](id, data)
                .then(d => {
                    if (d.data.message) {
                    this.$vs.notify({
                            color: 'success',
                            title: d.data.message,
                        });
                        //this.getBarcos();
                    }
                })
                .catch(e => {
                    console.log(`catch: ${e}`);
                    this.$vs.notify({
                        color: 'danger',
                        title: e,
                    });
                });
            this.$vs.loading.close();
        },
        /* Eliminar */
        deleteBarco(id){
            if(id){
                this.repositoryCall(OrdenesRepository , id , '');
            }
        },
        /* editar registro de barco 
        editData(barco){
            console.log('llego' , barco)
        },*/
        /* format date */
        dateFormat(date){
            return moment(date , 'YYYY-MM-DD').format('DD/MM/YYYY');
        },
       /* async getOrdenes(){
        openDialogo(id){
            this.selected_id = id;
            this.dialog = true;
        },
            let {data} = await OficinaRepository.getOrdenes()
            this.oficinas = data;
        },
        clearDate(){
            this.nome ='';
            this.oficina_id = null;
            this.status_id = null;
            this.documento = null;
        },
          creteOrden(){
            const DTO = {
                barco_id :this.selected_id,
                oficina_id : this.oficina_id,
                nome : this.nome,
                status_id : this.status_id,
                documento : this.documento
            }
            console.log('submit' , DTO)
            this.potsOrden(DTO)
        },
         async potsOrden(DTO){
            this.$vs.loading()
            let respose = await BarcoRepository.potsOrden(DTO)
            .then(d => {
                if (d.data.message) {
                    this.$vs.notify({
                        color: 'success',
                        title: d.data.message,
                    });
                    this.clearDate();
                    this.dialog = false;
                }
            })
            .catch(e => {
                console.log(`catch: ${e}`);
                this.$vs.notify({
                    color: 'danger',
                    title: e,
                });
            });
            this.$vs.loading.close();
        }, */
    },
    mounted () {
        this.getBarcos();
        this.getOficinas();
    },
}
</script>
<style scoped>
.popup-example {
    height: 75%;
    width: 75% !important;
}
</style>

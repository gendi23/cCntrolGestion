<template>
<v-row>
    <!-- title -->
    <v-card-text>
        <p class="text-2xl font-weight-semibold text--primary mb-2">Lista de Barcos</p>
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
    <v-col cols="12">
         <vs-popup classContent="popup-example"  title="Generar Orden" :active.sync="dialog">
        
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <label for=""> Nome</label>
                            <vs-input placeholder="Nome" v-model="nome"/>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label for="">Oficina</label>
                            <v-select
                                class="Select Oficina"
                                :options="oficinas"
                                :reduce="nome => nome.id"
                                label="nome"
                                :dir="$vs.rtl? 'rtl':'ltr'"
                                v-model="oficina_id"
                            />
                        </div>
                        
                    </div>
                    
                </div>
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <label for="">Estado</label>
                            <v-select
                                class="Select Oficina"
                                :options="status"
                                :reduce="nome => nome.id"
                                label="nome"
                                :dir="$vs.rtl? 'rtl':'ltr'"
                                v-model="status_id"
                            />  
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <label for="">Adjuntar</label>
                            <vs-input type="file"  v-model="documento"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 vs-row flex flex-auto justify-end">
                    <vs-button color="danger" type="filled" @click="clearDate">Cancelar</vs-button>
                    <vs-button color="primary" type="filled" @click="creteOrden">Crear</vs-button>
                </div>
            </div>    
        </vs-popup>
    </v-col>
   
  <!--   <vs-prompt
      @cancel="val=''"
     
      title="Cargar orden"
    >
        <div class="con-exemple-prompt">
           <vs-input placeholder="Nome" v-model="val"/>
            <v-select
                class="Select Oficina"
                :options="oficinas"
                :reduce="nome => nome.id"
                label="nome"
                :dir="$vs.rtl? 'rtl':'ltr'"
                v-model="select1"
            />
            <v-select
                class="Select Oficina"
                :options="status"
                :reduce="nome => nome.id"
                label="nome"
                :dir="$vs.rtl? 'rtl':'ltr'"
                v-model="select1"
            />
       </div>
    </vs-prompt> -->
    
</v-row>
</template>

<script>
import { RepositoryFactory } from '@/repositories/RepositoryFactory';
const  BarcoRepository = RepositoryFactory.get('barco');
const OficinaRepository = RepositoryFactory.get('oficina');
import {mapState , mapActions} from 'vuex';
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
        selected:[],
        nome:'',
        oficina_id:null,
        status_id:null,
        documento:null,
        dialog: false,
        oficinas:[],
        nome:'',
        status:[
            {id: 1 , nome:'Abierta'},
            {id: 2 , nome:'En proceso'},
            {id: 3 , nome:'Finalizada'},
            {id: 4 , nome:'Cerrada'},
        ],
        selected_id:null,
      }
    },
    computed: {
        ...mapState(['barcos']),
    },
    methods: {
        ...mapActions(['AccionGetBarcos']),
        /* obtener listado de barcos */
        async getBarcos(){
            let {data} = await BarcoRepository.getBarcos();
            this.AccionGetBarcos(data);
        },
        /* confirmar eliminacion */
        openConfirm(id){
            
            this.$vs.dialog({
                type:'confirm',
                color:'danger',
                title:'Eliminar Registro',
                text:'Estas seguro que desea eliminar el registro',
                accept:() => this.deleteBarco(id),
                acceptText : 'Aceptar',
                cancelText : 'Cancelar'
            });
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
                        this.getBarcos();
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
                this.repositoryCall(BarcoRepository , id , 'destroyBarco');
            }
        },
        /* editar registro de barco */
        editData(barco){
            console.log('llego' , barco)
        },
        /* format date */
        dateFormat(date){
            return moment(date , 'YYYY-MM-DD').format('DD/MM/YYYY');
        },
        openDialogo(id){
            this.selected_id = id;
            this.dialog = true;
        },
        async getOficinas(){
            let {data} = await OficinaRepository.getBarcos()
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
        },
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

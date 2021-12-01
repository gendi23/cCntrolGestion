<template>
    <v-row>
        <!-- title -->
        <v-card-text>
            <p class="text-2xl font-weight-semibold text--primary mb-2">Registro de Navio</p>
        </v-card-text>
        <!-- Form -->
        <v-form class="multi-col-validation">
            <v-row>
                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="nome"
                    label="Nome"
                    outlined
                    dense
                    placeholder="Nome"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="numero_IMO"
                    label="Numero IMO"
                    outlined
                    dense
                    placeholder="Numero IMO"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="armador"
                    label="Armador"
                    outlined
                    dense
                    placeholder="Armador"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="numero_registro"
                    label="Número de registro"
                    outlined
                    dense
                    placeholder="Número de registro"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="indicativo_chamada"
                    label="Indicativo de chamada"
                    outlined
                    dense
                    placeholder="Indicativo de chamada"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                
                    <v-text-field
                    v-model="ano_construcao"
                    label="Ano de construção"
                    outlined
                    dense
                    placeholder="Ano de construção"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="numero_construcao"
                    label="Lugar de construcción"
                    outlined
                    dense
                    placeholder="Lugar de construcción"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="estaleiro"
                    label="Estaleiro"
                    outlined
                    dense
                    placeholder="Estaleiro"
                    hide-details
                    ></v-text-field>
                </v-col>

               <!--  <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="email"
                    label="Material"
                    outlined
                    dense
                    placeholder="Material"
                    hide-details
                    ></v-text-field>
                </v-col> -->


                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="tipo_barco"
                    label="Tipo de barco"
                    outlined
                    dense
                    placeholder="Tipo de barco"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="navegacao"
                    label="Navegação"
                    outlined
                    dense
                    placeholder="Navegação"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="servico"
                    label="Serviço"
                    outlined
                    dense
                    placeholder="Serviço"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="n_p_a"
                    label="Número de passageiros aprovados"
                    outlined
                    dense
                    placeholder="Número de passageiros aprovados"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="cpmto_total"
                    label="Comprimento total"
                    outlined
                    dense
                    placeholder="Comprimento total"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="cpmto_perpendicular"
                    label="Comprimento entre perpendiculares"
                    outlined
                    dense
                    placeholder="Comprimento entre perpendiculares"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="manga"
                    label="Manga"
                    outlined
                    dense
                    placeholder="Manga"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="strut"
                    label="Strut"
                    outlined
                    dense
                    placeholder="Strut"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="tonelagem_bruta"
                    label="Tonelagem Bruta"
                    outlined
                    dense
                    placeholder="Tonelagem Bruta"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="tonelagem_líquida"
                    label="Tonelagem líquida"
                    outlined
                    dense
                    placeholder="Tonelagem líquida"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="transporte_bruto"
                    label="Transporte Bruto"
                    outlined
                    dense
                    placeholder="Transporte Bruto"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="motor_ignicao"
                    label=" Motor Ignicao"
                    outlined
                    dense
                    placeholder="Motor Ignicao"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="qantidade"
                    label="Quantidade"
                    outlined
                    dense
                    placeholder="Quantidade"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="marca"
                    label="Marca"
                    outlined
                    dense
                    placeholder="Marca"
                    hide-details
                    ></v-text-field>
                </v-col>
                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="modelo"
                    label="Modelo"
                    outlined
                    dense
                    placeholder="Modelo"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="potencia"
                    label="Potência / velocidade"
                    outlined
                    dense
                    placeholder="Potência / velocidade"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col cols="12">
                    <v-btn color="primary" @click="submitData()">
                    Submit
                    </v-btn>
                    <v-btn
                    type="reset"
                    outlined
                    class="mx-2"
                    >
                    Reset
                    </v-btn>
                </v-col>
            </v-row>
        </v-form>
    </v-row>
  
</template>

<script>
import { RepositoryFactory } from '@/repositories/RepositoryFactory';
const  BarcoRepository = RepositoryFactory.get('barco');

export default {
 data() {
     return {
        nome: '',
        numero_IMO: null,
        armador:'',
        numero_registro:null,
        indicativo_chamada:'',
        ano_construcao:null,
        numero_construcao:'',
        estaleiro:'',
        tipo_barco:'',
        navegacao:'',
        servico:'',
        n_p_a:null,
        cpmto_total:null,
        cpmto_perpendicular:null,
        manga:'',
        strut:'',
        tonelagem_bruta:'',
        tonelagem_líquida:'',
        transporte_bruto:'',
        motor_ignicao:'',
        qantidade:null,
        marca:'',
        modelo:'',
        potencia:'',
        oficina:1,
        items: ['Foo', 'Bar', 'Fizz', 'Buzz'],
     }
 },
 methods:{

    submitData(){
        const DTO ={
           nome:this.nome,
           numero_IMO: this.numero_IMO,
           armador:this.armador,
           numero_registro:this.numero_registro,
           indicativo_chamada:this.indicativo_chamada,
           ano_construcao:this.ano_construcao,
           numero_construcao:this.numero_construcao,
           estaleiro:this.estaleiro,
           tipo_barco:this.tipo_barco,
           navegacao:this.navegacao,
           servico:this.servico,
           n_p_a:this.n_p_a,
           cpmto_total:this.cpmto_total,
           cpmto_perpendicular:this.cpmto_perpendicular,
           manga:this.manga,
           strut:this.strut,
           tonelagem_bruta:this.tonelagem_bruta,
           tonelagem_líquida:this.tonelagem_líquida,
           transporte_bruto:this.tonelagem_bruta,
           motor_ignicao:this.motor_ignicao,
           qantidade:this.qantidade,
           marca:this.marca,
           modelo:this.modelo,
           potencia:this.potencia,
           oficina:this.oficina
        }
        console.log(DTO)
        this.postBarco(DTO);
    },
    async postBarco(DTO){
        this.$vs.loading()
        let respose = await BarcoRepository.potsBarco(DTO)
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
    
 }
}
</script>

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
                    v-model="firstName"
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
                    v-model="lastName"
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
                    v-model="email"
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
                    v-model="city"
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
                    v-model="country"
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
                    v-model="company"
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
                    v-model="firstName"
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
                    v-model="lastName"
                    label="Estaleiro"
                    outlined
                    dense
                    placeholder="Estaleiro"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col
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
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="city"
                    label="Número de construção"
                    outlined
                    dense
                    placeholder="Número de construção"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="country"
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
                    v-model="company"
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
                    v-model="firstName"
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
                    v-model="lastName"
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
                    v-model="email"
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
                    v-model="city"
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
                    v-model="country"
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
                    v-model="company"
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
                    v-model="firstName"
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
                    v-model="lastName"
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
                    v-model="email"
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
                    v-model="city"
                    label="City"
                    outlined
                    dense
                    placeholder="City"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col
                    cols="12"
                    md="6"
                >
                    <v-text-field
                    v-model="country"
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
                    v-model="company"
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
                    v-model="email"
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
                    v-model="city"
                    label="Potência / velocidade"
                    outlined
                    dense
                    placeholder="Potência / velocidade"
                    hide-details
                    ></v-text-field>
                </v-col>

                <v-col cols="12">
                    <v-btn color="primary">
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
import { ref } from '@vue/composition-api'

export default {
  setup() {
    const firstName = ref('')
    const lastName = ref('')
    const city = ref('')
    const country = ref('')
    const company = ref('')
    const email = ref('')
    const checkbox = ref(false)

    return {
      firstName,
      lastName,
      city,
      country,
      company,
      email,
      checkbox,
    }
  },
}
</script>

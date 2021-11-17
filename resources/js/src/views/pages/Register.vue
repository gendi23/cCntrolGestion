<template>
  <div class="auth-wrapper auth-v1">
    <div class="auth-inner">
      <v-card class="auth-card">
      
        <!-- title -->
        <v-card-title class="d-flex align-center justify-center py-7">
          <router-link to="/" class="d-flex align-center">
            <v-img
              :src="require('@/assets/images/logos/logo.png').default"
              max-height="30px"
              max-width="30px"
              alt="logo"
              contain
              class="me-3"
            ></v-img>

            <h2 class="text-2xl font-weight-semibold">Cadastro</h2>
          </router-link>
        </v-card-title>
        
        <!-- login form -->
        <v-card-text>
          <v-form>
            <v-text-field
              v-model="nome"
              outlined
              label="Nome"
              placeholder="John "
              hide-details
              class="mb-3"
              requerid
            ></v-text-field>
            <v-text-field
              v-model="sobrenome"
              outlined
              label="Sobrenome"
              placeholder="Sobrenome"
              hide-details
              class="mb-3"
            ></v-text-field>
            <v-text-field
              v-model="email"
              outlined
              label="o email"
              placeholder="john@example.com"
              hide-details
              class="mb-3"
            ></v-text-field>
            
             <v-text-field
              v-model="empresa"
              outlined
              label="Empresa"
              placeholder="Empresa"
              hide-details
              class="mb-3"
            ></v-text-field>
             <v-text-field
              v-model="endereco"
              outlined
              label="Endereço"
              placeholder="Endereço"
              hide-details
              class="mb-3"
            ></v-text-field>
            <v-text-field
              v-model="senha"
              outlined
              :type="isPasswordVisible ? 'text' : 'password'"
              label="Senha"
              placeholder="············"
              :append-icon="isPasswordVisible ? icons.mdiEyeOffOutline : icons.mdiEyeOutline"
              hide-details
              @click:append="isPasswordVisible = !isPasswordVisible"
            ></v-text-field>

            <v-btn block color="primary" class="mt-6" @click="submit"> Sign Up </v-btn>
          </v-form>
        </v-card-text>

        <!-- create new account  -->
        <v-card-text class="d-flex align-center justify-center flex-wrap mt-2">
          <span class="me-2"> Already have an account? </span>
          <router-link :to="{ name: 'login' }"> Sign in instead </router-link>
        </v-card-text>

      </v-card>
    </div>
  </div>
</template>

<script>
// eslint-disable-next-line object-curly-newline
import { mdiFacebook, mdiTwitter, mdiGithub, mdiGoogle, mdiEyeOutline, mdiEyeOffOutline } from '@mdi/js'
import { ref } from '@vue/composition-api'
import { RepositoryFactory } from '@/repositories/RepositoryFactory';
const AuthRepository = RepositoryFactory.get('auth');

export default {
  setup() {
    const isPasswordVisible = ref(false)
    const username = ref('')
    const email = ref('')
    const password = ref('')
    const socialLink = [
      {
        icon: mdiFacebook,
        color: '#4267b2',
        colorInDark: '#4267b2',
      },
      {
        icon: mdiTwitter,
        color: '#1da1f2',
        colorInDark: '#1da1f2',
      },
      {
        icon: mdiGithub,
        color: '#272727',
        colorInDark: '#fff',
      },
      {
        icon: mdiGoogle,
        color: '#db4437',
        colorInDark: '#db4437',
      },
    ]

    return {
      isPasswordVisible,
      username,
      email,
      password,
      socialLink,

      icons: {
        mdiEyeOutline,
        mdiEyeOffOutline,
      },
    }
  },
  data() {
    return {
      nome: "",
      sobrenome:"",
      email:"",
      empresa:"",
      endereco:"",
      senha:"",
    }
  },
  methods: {
    submit() {
        const DTO = {
          nome:this.nome +' '+ this.sobrenome,
          email : this.email ,
          empresa:this.empresa,
          endereco:this.endereco,
          senha : this.senha
        }
        this.postSignUp(DTO);
    },
    async postSignUp(data){
      let response = undefined;
      response = await AuthRepository.postSignUp(data).then((d)=>{
          console.log(d.data.error)
          if (!d.error) {
             this.$vs.notify({
                color:"success",
                title:d.data.message
            });
            this.$router.push('/login').catch(()=>{});
          
          }else{
              this.$vs.notify({
                color:"warning",
                title:d.data.message
            });
          }
        })
        .catch((e)=>{
          console.log(`catch ${e}`)
        })
    }
  },
}
</script>

<style lang="scss">
@import '~@resources/sass/preset/pages/auth.scss';
</style>

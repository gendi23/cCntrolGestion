<template>
  <div class="auth-wrapper auth-v1">
    <div class="auth-inner">
      <v-card class="auth-card">
        <!-- logo -->
        
        <v-card-title class="d-flex align-center justify-center py-7">
          <router-link to="/" class="d-flex align-center">
            <v-img
              :src="require('@/assets/images/logos/logo.png').default"
              max-height="1000px"
              max-width="1000px"
              alt="logo"
              contain
              class="me-4"
            ></v-img>

           
          </router-link>
         
        </v-card-title>
        
        
        <v-card-text class="d-flex d-flex align-center justify-center py-2 ">
           <h2 class="text-2xl font-weight-semibold ">Conecte-se</h2>
        </v-card-text>

        <!-- login form -->
        <v-card-text>
          <v-form>
            <v-text-field
              v-model="email"
              outlined
              label="Email"
              placeholder="john@example.com"
              hide-details
              class="mb-3"
            >
            </v-text-field>

            <v-text-field
              v-model="password"
              outlined
              :type="isPasswordVisible ? 'text' : 'password'"
              label="Password"
              placeholder="············"
              :append-icon="isPasswordVisible ? icons.mdiEyeOffOutline : icons.mdiEyeOutline"
              hide-details
              @click:append="isPasswordVisible = !isPasswordVisible"
            ></v-text-field>

            <div class="d-flex align-center justify-space-between flex-wrap">
              <v-checkbox label="Remember Me" hide-details class="me-3 mt-1"> </v-checkbox>

              <!-- forgot link -->
              <router-link :to="{ name: 'forgot-password' }" class="mt-1"> Forgot Password? </router-link>
            </div>

            <v-btn block color="primary" class="mt-6" @click="submit()"> Login </v-btn>
            <v-card-text class="d-flex align-center justify-center flex-wrap mt-2">
              <router-link :to="{ name: 'register' }"> Cadastre-se </router-link>
            </v-card-text>

          </v-form>
        </v-card-text>

        <!-- create new account  
        <v-card-text class="d-flex align-center justify-center flex-wrap mt-2">
          <span class="me-2"> New on our platform? </span>
          <router-link :to="{ name: 'pages-register' }"> Create an account </router-link>
        </v-card-text>
-->
        <!-- divider 
        <v-card-text class="d-flex align-center mt-2">
          <v-divider></v-divider>
          <span class="mx-5">or</span>
          <v-divider></v-divider>
        </v-card-text>
-->
        <!-- social links 
        <v-card-actions class="d-flex justify-center">
          <v-btn v-for="link in socialLink" :key="link.icon" icon class="ms-1">
            <v-icon :color="$vuetify.theme.dark ? link.colorInDark : link.color">
              {{ link.icon }}
            </v-icon>
          </v-btn>
        </v-card-actions>\-->
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
      email,
      password,
      socialLink,

      icons: {
        mdiEyeOutline,
        mdiEyeOffOutline,
      },
    }
  },
  methods: {
      submit() {
        const DTO = {
          email : this.email ,
          password : this.password
        }
        this.postLogin(DTO);
      },
      async postLogin(data){
        let response = await AuthRepository.postLogin(data)
        .then((d)=>{
          console.log(d.data.error)
          if (d.data.error) {
            this.$vs.notify({
                color:"warning",
                title:d.data.message
            });
          }else{
             this.$vs.notify({
                color:"success",
                title:d.data.message
            });
            this.$router.push('/dashboard').catch(()=>{});
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

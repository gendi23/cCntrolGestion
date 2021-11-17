<template>
  <div class="auth-wrapper auth-v1">
    <div class="auth-inner">
      <v-card class="auth-card">
        <!-- logo -->
        <v-card-title class="d-flex align-center justify-center py-7">
          <router-link to="/" class="d-flex align-center">
            <h2 class="text-2xl font-weight-semibold">Recupere sua senha</h2>
          </router-link>
        </v-card-title>
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

            <v-btn block color="primary" class="mt-6" @click="submit()">Recuperar senha</v-btn>
            <v-card-text class="d-flex align-center justify-center flex-wrap mt-2">
              <router-link :to="{ name: 'login' }">Login</router-link>
            </v-card-text>

          </v-form>
        </v-card-text>

      </v-card>
    </div>
  </div>
</template>

<script>

import { RepositoryFactory } from '@/repositories/RepositoryFactory';
const AuthRepository = RepositoryFactory.get('auth');
export default {
    data() {
        return {
            email: ""
        }
    },
    methods: {
        async passwordEmail(data) {
            //this.$vs.loading();
            this.$router.push({ name: 'recover-password' });
            return
            let response = await AuthRepository.passwordEmail(data)
                .then((d) => {
                if (d.error) {
                    this.$vs.notify({
                    color: "warning",
                    title: d.error
                    });
                } else {
                    this.$vs.notify({
                    color: "success",
                    title: d.message,
                    });
                    this.$router.push({ name: 'recover-password' });
                }
                })
                .catch((e) => {
                console.log(`catch: ${e}`);
                this.$vs.notify({
                    color: "danger",
                    title: e,
                });
                });
            //this.$vs.loading.close();
        },
        submit() {
            //this.$validator.validateAll().then((result) => {
                //if (result) {
                const DTO = {
                    email: this.email,
                };
                this.passwordEmail(DTO);
                //}
            //});
        }
    },
}
</script>

<style lang="scss">
@import '~@resources/sass/preset/pages/auth.scss';
</style>

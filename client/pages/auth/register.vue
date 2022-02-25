<template>
  <div class="container">
    <div class="col-md-6 offset-md-3">
      <div class="card mt-4">
        <div class="card-header">
          <p class="mb-0">Register</p>
        </div>
        <div class="card-body">
          <form @submit.prevent="register">
            <div class="form-group">
              <label>Name</label>
              <input v-model="form.name" type="text" class="form-control" :class="{ 'is-invalid': errors.name}" placeholder="Name" />
              <div class="invalid-feedback" v-if="errors.name">
                {{errors.name[0]}}
              </div>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input v-model="form.email" type="email" class="form-control" :class="{ 'is-invalid': errors.email}" placeholder="Email" />
              <div class="invalid-feedback" v-if="errors.email">
                {{errors.email[0]}}
              </div>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input v-model="form.password" type="password" class="form-control" :class="{ 'is-invalid': errors.password}" placeholder="Password" />
              <div class="invalid-feedback" v-if="errors.password">
                {{errors.password[0]}}
              </div>
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-primary w-100" value="Register" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  middleware:'guest',
  data(){
    return {
      form: {
        name: '',
        email: '',
        password: '',
      }
    }
  },
  methods: {
    async register(evt){
      evt.preventDefault();
      await this.$axios.post('auth/register', this.form).then(async response => {
        if (response.data.success && response.data.data) {
          this.$auth.login({data: this.form})
          this.$auth.setUser(response.data.data);
          this.$router.push(this.$route.query.redirect ? this.$route.query.redirect : '/');
        }
      }).catch(e => {console.log(e.message);this.loading = false;});
    }
  }
}
</script>

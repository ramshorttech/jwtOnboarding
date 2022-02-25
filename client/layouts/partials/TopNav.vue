<template>
  <div class="header">
    <b-navbar type="light" variant="light" toggleable="sm">
      <div class="container-fluid">
        <nuxt-link class="navbar-brand" to="/">Jwt-Auth</nuxt-link>

        <b-navbar-toggle target="nav_dropdown_collapse"></b-navbar-toggle>
        <b-collapse is-nav id="nav_dropdown_collapse">
          <b-nav-form class="ml-auto" v-if="authenticated">
            <!-- <b-input-group
              append-html="<button class='btn-search' type='submit' >Search</button>"
            >
              <b-form-input placeholder="Search" name="search" :value="this.$route.query.search"></b-form-input>
            </b-input-group> -->
          </b-nav-form>
          <b-navbar-nav class="ml-auto">
            <template v-if="authenticated">
              <b-nav-item-dropdown>
                <template slot="button-content">
                  {{ user.name }}
                </template>
                <b-dropdown-item @click.prevent="logout">Sign Out</b-dropdown-item>
              </b-nav-item-dropdown>
            </template>
            <template v-else>
              <li class="nav-item">
                <nuxt-link class="nav-link" to="/auth/login">Login</nuxt-link>
              </li>
              <li class="nav-item">
                <nuxt-link class="nav-link" to="/auth/register">Register</nuxt-link>
              </li>
            </template>
          </b-navbar-nav>
        </b-collapse>
      </div>
    </b-navbar>
  </div>
</template>
<script>
export default {
  methods: {
    async logout(evt){
      evt.preventDefault;
      await this.$auth.logout();
    }
  }
}
</script>
<style lang="scss">
.header {
  &--navebar {
    background-color: black;
  }
  .navbar-brand {
    font-weight: 700;
    font-size: 24px;
  }
  .input-group-text {
    height: 50px;
    background-color: #ffc107;
    color: #fff;
    font-weight: 700;
  }
  .form-control {
    height: 50px;
  }
  @media (min-width: 768px) {
    .input-group-text {
      width: 130px;
    }
    .form-control {
      width: 365px;
    }
  }
  .btn-search {
    margin: 0 auto;
    border: none;
    background-color: transparent;
    color:#ffffff;
  }
}
body {
  background-color: #efefef;
  color: #000000;
}
</style>

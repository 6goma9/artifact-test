<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
      <div class="container">
        <!---------- navbar ---------->
        <a class="navbar-brand" href="#">Article Create View</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportContent"
          aria-controls="nabvarSupportContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <router-link class="nav-link" to="/manage">Create</router-link>
            </li>
          </ul>

          <div v-if="manager !== null" class="dropdown">
            <a
              class="btn btn-primary dropdown-toggle my-2 my-sm-0"
              href="#"
              role="button"
              id="dropdownMenuLink"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >{{ manager.mail_address }}</a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" v-on:click="logout()">Logout</a>
            </div>
          </div>
          <button
            v-else
            class="btn btn-outline-info my-2 my-sm-0"
            type="button"
            data-toggle="modal"
            data-target="#loginModal"
          >login</button>
        </div>
      </div>
    </nav>
    <!---------- /navbar ---------->
    <!---------- modal ---------->
    <div
      class="modal fade"
      id="loginModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="LoginModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="LoginModalLabel">Login Form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <label>Email address</label>
            <input
              v-model="loginForm.mail_address"
              type="email"
              class="form-control"
              placeholder="Enter email"
            >
            <label>Password</label>
            <input
              v-model="loginForm.password"
              type="password"
              class="form-control"
              placeholder="Password"
            >
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button v-on:click="login()" type="button" class="btn btn-primary">Login</button>
          </div>
        </div>
      </div>
    </div>
    <!---------- /modal ---------->
  </div>
</template>

<script>
import { mapGetters } from "vuex";

export default {
  data() {
    return {
      manager: null,
      loginForm: {
        mail_address: "",
        password: ""
      }
    };
  },
  computed: {
    ...mapGetters({ getManager: "managerAuth/getManager" })
  },
  mounted() {
    this.manager = $cookies.get("manager") || null;
  },
  methods: {
    async login() {
      await this.$store.dispatch("managerAuth/login", this.loginForm);
      $cookies.set("manager", this.getManager);
      this.manager = this.getManager;
      $("#loginModal").modal("hide");
    },
    async logout() {
      await this.$store.dispatch("managerAuth/logout");
      this.clearData();
      $cookies.remove("manager");
    },
    clearData() {
      this.manager = null;
      this.loginForm = {
        mail_address: "",
        password: ""
      };
    }
  }
};
</script>

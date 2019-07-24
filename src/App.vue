<template>
  <v-app>
    <v-toolbar app>
      <v-toolbar-title class="headline text-uppercase">
        <span>{{register}}</span>
        <span class="font-weight-light">su 1x2Live</span>
      </v-toolbar-title>
    </v-toolbar>

    <v-content>
      <Home />
    </v-content>
  </v-app>
</template>

<script>
import Home from "./components/Home";

export default {
  name: "App",
  components: {
    Home
  },
  data() {
    return {
      register: "Registrati "
    };
  }
};
</script>

<style>
body {
  font-family: "Montserrat", sans-serif !important;
}

.theme--light.application {
  background: #fff;
  color: rgba(0, 0, 0, 0.87);
  /* width: 994px;

    margin: 40px auto; */
}

.theme--light.v-icon {
  color: rgba(111, 111, 111, 0.54);
}

/* v-stepper__step__step primary {
  background-color: #d21919 !important;
  border-color: #d21919 !important;
} */
</style>

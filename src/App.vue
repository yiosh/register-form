<template>
  <v-app id="inspire">
    <v-toolbar app color="white">
      <v-toolbar-title class="headline text-uppercase">
        <span>{{register}}</span>
        <span class="font-weight-light">su</span>
      </v-toolbar-title>

      <v-img
        src="https://secure.1x2live.it/fl_config/secure.1x2live.it/img/logo.jpg"
        max-height="100%"
        contain
        style="margin: 0 auto"
      ></v-img>

      <!-- <v-spacer></v-spacer>
      <v-spacer></v-spacer>-->

      <v-toolbar-items></v-toolbar-items>
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
#inspire {
  font-family: "Montserrat", sans-serif !important;
  background-color: #f5f5f5;
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

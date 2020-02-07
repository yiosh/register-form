<template>
  <v-app id="inspire">
    <v-toolbar
      height="50px"
      elevation="0"
      style="box-shadow: 0px 2px 5px 2px rgba(0, 0, 0, 0.1) !important;"
      app
      color="white"
    >
      <!-- <v-toolbar-title class="headline text-uppercase">
        <span>{{ register }}</span>
        <span class="font-weight-light">su</span>
      </v-toolbar-title> -->

      <v-img
        :src="src"
        max-height="100%"
        contain
        style="margin: 0 auto"
      ></v-img>

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
      // src:
      //   location.hostname === "localhost"
      //     ? "//secure.1x2live.it/fl_config/secure.1x2live.it/img/logo.jpg"
      //     : "/fl_app/registerForm/logo.jpg",
      register: "Registrati "
    };
  },
  computed: {
    src() {
      if (location.hostname === "localhost") {
        return "https://secure.1x2live.it/fl_app/registerForm/logo.jpg";
      }
      return "/fl_app/registerForm/logo.jpg";
    }
  }
};
</script>

<style>
#inspire {
  font-family: "Montserrat", sans-serif !important;
  background-color: rgb(245, 245, 245) !important;
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

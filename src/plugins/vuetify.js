import Vue from "vue";
import Vuetify from "vuetify/lib";
import "vuetify/src/stylus/app.styl";
import "@mdi/font/css/materialdesignicons.css";
import { Scroll } from 'vuetify/lib/directives'

Vue.use(Vuetify, {
  directives: {
    Scroll
  }
});


Vue.use(Vuetify, {
  iconfont: "mdi",
});

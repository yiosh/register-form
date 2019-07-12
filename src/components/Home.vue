<template>
  <v-stepper v-model="currentStep" vertical>
    <v-stepper-step editable :complete="currentStep > 1" step="1">
      Contact Details
    </v-stepper-step>

    <v-stepper-content step="1">
      <v-card class="mb-5" flat>
        <v-form v-model="valid">
          <v-container>
            <v-layout>
              <v-flex xs12 md6>
                <v-text-field
                  v-model="contactDetails.name"
                  :rules="nameRules"
                  prepend-icon="mdi-account"
                  label="First name"
                  required
                ></v-text-field>
                <v-text-field
                  v-model="contactDetails.lastname"
                  :rules="nameRules"
                  prepend-icon="mdi-account"
                  label="Last name"
                  required
                ></v-text-field>
                <v-text-field
                  v-model="contactDetails.email"
                  :rules="emailRules"
                  prepend-icon="mdi-email"
                  label="E-mail"
                  required
                ></v-text-field>
              </v-flex>

              <v-flex xs12 md6>
                <v-text-field
                  v-model="contactDetails.phone"
                  :rules="emailRules"
                  prepend-icon="mdi-cellphone"
                  label="Phone"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="contactDetails.codiceFiscale"
                  :rules="emailRules"
                  prepend-icon="mdi-account-card-details"
                  label="Codice Fiscale"
                  required
                ></v-text-field>

                <v-menu
                  ref="menu"
                  v-model="menu"
                  :close-on-content-click="false"
                  :nudge-right="40"
                  :return-value.sync="contactDetails.birthdate"
                  lazy
                  transition="scale-transition"
                  offset-y
                  full-width
                  min-width="290px"
                >
                  <template v-slot:activator="{ on }">
                    <v-text-field
                      v-model="contactDetails.birthdate"
                      label="Picker in menu"
                      prepend-icon="event"
                      readonly
                      v-on="on"
                    ></v-text-field>
                  </template>
                  <v-date-picker
                    v-model="contactDetails.birthdate"
                    no-title
                    scrollable
                  >
                    <v-spacer></v-spacer>
                    <v-btn flat color="primary" @click="menu = false"
                      >Cancel</v-btn
                    >
                    <v-btn
                      flat
                      color="primary"
                      @click="$refs.menu.save(contactDetails.birthdate)"
                      >OK</v-btn
                    >
                  </v-date-picker>
                </v-menu>
              </v-flex>
            </v-layout>
          </v-container>
        </v-form>
      </v-card>
      <v-btn color="success" @click="currentStep = 2">Continue</v-btn>
    </v-stepper-content>

    <v-stepper-step editable :complete="currentStep > 2" step="2">
      Company Details
    </v-stepper-step>

    <v-stepper-content step="2">
      <v-card class="mb-5" flat>
        <v-form v-model="valid">
          <v-container>
            <v-layout>
              <v-flex xs12 md6>
                <v-text-field
                  v-model="companyDetails.companyName"
                  :rules="nameRules"
                  prepend-icon="mdi-account"
                  label="Company Name"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="companyDetails.piva"
                  :rules="nameRules"
                  prepend-icon="mdi-file-document-box"
                  label="P.IVA"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="companyDetails.codiceFiscale"
                  :rules="nameRules"
                  prepend-icon="mdi-file-document-box"
                  label="Codice Fiscale"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="companyDetails.numeroCivico"
                  :rules="emailRules"
                  prepend-icon="mdi-counter"
                  label="Numero Civico"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="companyDetails.phone"
                  :rules="emailRules"
                  prepend-icon="mdi-phone"
                  label="Telefono"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="companyDetails.website"
                  :rules="emailRules"
                  prepend-icon="mdi-web"
                  label="Sito Web"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="companyDetails.pec"
                  :rules="emailRules"
                  prepend-icon="mdi-email"
                  label="PEC"
                  required
                ></v-text-field>
              </v-flex>

              <v-flex xs12 md6>
                <v-text-field
                  v-model="companyDetails.address"
                  :rules="emailRules"
                  prepend-icon="mdi-map-marker"
                  label="Indirizzo Sede Legale"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="companyDetails.state"
                  :rules="emailRules"
                  prepend-icon="mdi-map-marker"
                  label="Stato"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="companyDetails.region"
                  :rules="emailRules"
                  prepend-icon="mdi-map-marker"
                  label="Regione"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="companyDetails.province"
                  :rules="emailRules"
                  prepend-icon="mdi-map-marker"
                  label="Provincia"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="companyDetails.city"
                  :rules="emailRules"
                  prepend-icon="mdi-map-marker"
                  label="Città"
                  required
                ></v-text-field>

                <v-text-field
                  v-model="companyDetails.cap"
                  :rules="emailRules"
                  prepend-icon="mdi-map-marker"
                  label="CAP"
                  required
                ></v-text-field>
              </v-flex>
            </v-layout>
          </v-container>
        </v-form>
      </v-card>
      <v-btn color="success" @click="currentStep = 3">Continue</v-btn>
    </v-stepper-content>

    <v-stepper-step editable :complete="currentStep > 3" step="3">
      Select Plan
    </v-stepper-step>

    <v-stepper-content step="3">
      <v-card class="mb-5" flat>
        <v-layout>
          <v-flex>
            <v-btn block color="success" @click="currentStep = 5">
              Free
            </v-btn>
          </v-flex>
        </v-layout>
        <v-layout>
          <v-flex>
            <v-btn block color="warning" @click="currentStep = 4">
              Plan A
            </v-btn>
          </v-flex>
        </v-layout>
        <v-layout>
          <v-flex>
            <v-btn block color="error" @click="currentStep = 4">
              Plan B
            </v-btn>
          </v-flex>
        </v-layout>
      </v-card>
    </v-stepper-content>

    <v-stepper-step step="4">
      Payment
    </v-stepper-step>
    <v-stepper-content step="4">
      <v-card color="grey lighten-1" class="mb-5" height="200px"></v-card>
      <v-btn color="primary" @click="currentStep = 5">Continue</v-btn>
      <v-btn flat>Cancel</v-btn>
    </v-stepper-content>

    <v-stepper-step editable step="5">
      Company Logo
    </v-stepper-step>
    <v-stepper-content step="5">
      <v-card flat class="mb-5">
        <v-btn v-if="!imgDataUrl" @click="toggleShow">Set avatar</v-btn>
        <my-upload
          field="img"
          @crop-success="cropSuccess"
          @crop-upload-success="cropUploadSuccess"
          @crop-upload-fail="cropUploadFail"
          v-model="show"
          langType="en"
          :width="300"
          :height="300"
          :params="params"
          :headers="headers"
          img-format="jpg"
        ></my-upload>
        <img v-if="imgDataUrl" @click="toggleShow" :src="imgDataUrl" />
      </v-card>
      <v-btn color="success" @click="currentStep = 6">Continue</v-btn>
      <v-btn color="primary" flat @click="currentStep = 6">Skip</v-btn>
    </v-stepper-content>

    <v-stepper-step step="6">
      Resume
    </v-stepper-step>
    <v-stepper-content step="6">
      <v-card class="mb-5">
        <!-- <div class="d-flex justify-between align-center mb-3">
          <v-btn @click="all">all</v-btn>
          <v-btn @click="none">none</v-btn>
        </div> -->

        <v-expansion-panel v-model="panel" expand>
          <v-expansion-panel-content>
            <template v-slot:header>
              <div>Contact Details</div>
            </template>
            <v-card flat>
              <v-card-text
                >Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo consequat.</v-card-text
              >
            </v-card>
          </v-expansion-panel-content>

          <v-expansion-panel-content>
            <template v-slot:header>
              <div>Company Details</div>
            </template>
            <v-card flat>
              <v-card-text
                >Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo consequat.</v-card-text
              >
            </v-card>
          </v-expansion-panel-content>

          <v-expansion-panel-content>
            <template v-slot:header>
              <div>Plan</div>
            </template>
            <v-card flat>
              <v-card-text
                >Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo consequat.</v-card-text
              >
            </v-card>
          </v-expansion-panel-content>

          <v-expansion-panel-content>
            <template v-slot:header>
              <div>Payment</div>
            </template>
            <v-card flat>
              <v-card-text
                >Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut
                enim ad minim veniam, quis nostrud exercitation ullamco laboris
                nisi ut aliquip ex ea commodo consequat.</v-card-text
              >
            </v-card>
          </v-expansion-panel-content>
        </v-expansion-panel>
      </v-card>
      <v-btn color="primary">Confirm</v-btn>
    </v-stepper-content>
  </v-stepper>
</template>

<script>
// import PictureInput from "vue-picture-input";
import myUpload from "vue-image-crop-upload";
import VueCropper from "vue-cropperjs";
import "cropperjs/dist/cropper.css";
export default {
  components: {
    // PictureInput
    VueCropper,
    "my-upload": myUpload
  },
  data() {
    return {
      panel: [true, true, true, true],
      items: 5,
      currentStep: 1,
      menu: false,
      modal: false,
      show: false,
      valid: true,
      nameRules: [
        v => !!v || "Name is required",
        v => v.length <= 10 || "Name must be less than 10 characters"
      ],
      emailRules: [
        v => !!v || "E-mail is required",
        v => /.+@.+/.test(v) || "E-mail must be valid"
      ],
      contactDetails: {
        name: "",
        lastname: "",
        email: "",
        phone: "",
        codiceFiscale: "",
        birthdate: new Date().toISOString().substr(0, 10)
      },
      companyDetails: {
        companyName: "",
        piva: "",
        codiceFiscale: "",
        state: "",
        region: "",
        province: "",
        city: "",
        address: "",
        numeroCivico: "",
        cap: "",
        phone: "",
        website: "",
        pec: ""
      },
      planSelected: "",
      payment: {},
      imgDataUrl: "",
      params: {
        token: "123456798",
        name: "avatar"
      },
      headers: {
        smail: "*_~"
      },
      imgDataUrl: "",
      en: {
        hint: "Click or drag the file here to upload",
        loading: "Uploading…",
        noSupported:
          "Browser is not supported, please use IE10+ or other browsers",
        success: "Upload success",
        fail: "Upload failed",
        preview: "Preview",
        btn: {
          off: "Cancel",
          close: "Close",
          back: "Back",
          save: "Save"
        },
        error: {
          onlyImg: "Image only",
          outOfSize: "Image exceeds size limit: ",
          lowestPx: "Image's size is too low. Expected at least: "
        }
      }
    };
  },
  methods: {
    onChange(image) {
      console.log("New picture selected!");
      if (image) {
        console.log("Picture loaded.");
        this.image = image;
      } else {
        console.log("FileReader API not supported: use the <form>, Luke!");
      }
    },
    toggleShow() {
      this.show = !this.show;
    },
    /**
     * crop success
     *
     * [param] imgDataUrl
     * [param] field
     */
    cropSuccess(imgDataUrl, field) {
      console.log("-------- crop success --------");
      this.imgDataUrl = imgDataUrl;
      console.log("image", this.imgDataUrl);
    },
    /**
     * upload success
     *
     * [param] jsonData  server api return data, already json encode
     * [param] field
     */
    cropUploadSuccess(jsonData, field) {
      console.log("-------- upload success --------");
      console.log(jsonData);
      console.log("field: " + field);
    },
    /**
     * upload fail
     *
     * [param] status    server api return error status, like 500
     * [param] field
     */
    cropUploadFail(status, field) {
      console.log("-------- upload fail --------");
      console.log(status);
      console.log("field: " + field);
    },
    // Create an array the length of our items
    // with all values as true
    all() {
      this.panel = [...Array(this.items).keys()].map(_ => true);
    },
    // Reset the panel
    none() {
      this.panel = [];
    }
  }
};
</script>

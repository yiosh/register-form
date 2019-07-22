<template>
  <v-stepper v-model="currentStep" vertical>
    <v-stepper-step editable :complete="currentStep > 1" step="1">Contact Details</v-stepper-step>

    <v-stepper-content step="1">
      <v-card class="mb-3" flat>
        <v-form v-model="valid">
          <v-container fluid>
            <v-layout wrap>
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
                      label="Birthday"
                      prepend-icon="event"
                      readonly
                      v-on="on"
                    ></v-text-field>
                  </template>
                  <v-date-picker v-model="contactDetails.birthdate" no-title scrollable>
                    <v-spacer></v-spacer>
                    <v-btn flat color="primary" @click="menu = false">Cancel</v-btn>
                    <v-btn
                      flat
                      color="primary"
                      @click="$refs.menu.save(contactDetails.birthdate)"
                    >OK</v-btn>
                  </v-date-picker>
                </v-menu>
              </v-flex>
            </v-layout>
          </v-container>
        </v-form>
      </v-card>
      <v-btn block color="success" @click="currentStep = 2">Continue</v-btn>
    </v-stepper-content>

    <v-stepper-step editable :complete="currentStep > 2" step="2">Company Details</v-stepper-step>

    <v-stepper-content step="2">
      <v-card class="mb-3" flat>
        <v-form v-model="valid">
          <v-container fluid>
            <v-layout wrap>
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
      <v-btn block color="success" @click="currentStep = 3">Continue</v-btn>
    </v-stepper-content>

    <v-stepper-step editable :complete="currentStep > 3" step="3">Select Plan</v-stepper-step>

    <v-stepper-content step="3">
      <v-card class="mb-3" flat>
        <v-layout wrap>
          <v-flex xs12 md3 text-xs-center>
            <v-btn block color="success" large @click="handleFree">Free</v-btn>
          </v-flex>
          <v-spacer></v-spacer>
          <v-flex xs12 md3 text-xs-center>
            <v-btn block color="warning" large @click="handlePlanA">Plan A</v-btn>
          </v-flex>
          <v-spacer></v-spacer>
          <v-flex xs12 md3 text-xs-center>
            <v-btn block color="error" large @click="handlePlanB">Plan B</v-btn>
          </v-flex>
        </v-layout>
      </v-card>
    </v-stepper-content>

    <v-stepper-step step="4">Payment</v-stepper-step>
    <v-stepper-content step="4">
      <v-card class="mb-3" flat>
        <h3>Come vuoi ricevere la fattura?</h3>
        <v-layout>
          <v-flex>
            <v-radio-group v-model="payment.whereTo">
              <v-radio label="Option 1" value="option1"></v-radio>
              <v-radio label="Option 2" value="option2"></v-radio>
            </v-radio-group>
          </v-flex>
        </v-layout>
        <h3>Info Pay</h3>
        <v-radio-group v-model="payment.infopay">
          <v-radio label="Paypal" value="paypal"></v-radio>
          <v-radio label="Stripe" value="stripe"></v-radio>
        </v-radio-group>
      </v-card>
      <v-btn color="success" @click="currentStep = 5">Continue</v-btn>
    </v-stepper-content>

    <v-stepper-step editable step="5">Company Logo</v-stepper-step>
    <v-stepper-content step="5">
      <v-card flat class="mb-3">
        <vue-core-image-upload
          class="btn btn-primary"
          crop="local"
          :isXhr="false"
          @imagechanged="imagechanged"
          @imageuploading="imageuploading"
          @imageuploaded="imageuploaded"
          :max-file-size="5242880"
        >
          <v-btn color="primary" type="file">Upload Image</v-btn>
        </vue-core-image-upload>
        <v-card-text>
          <v-avatar v-if="src" color="grey lighten-4" class="mb-3" size="90">
            <img :src="src" alt="avatar" />
          </v-avatar>
          <!-- <img v-if="src" :src="src" /> -->
          <p v-if="file">{{ file.name }}</p>
        </v-card-text>
      </v-card>
      <v-btn color="success" @click="currentStep = 6">Continue</v-btn>
      <v-btn color="primary" flat @click="currentStep = 6">Skip</v-btn>
    </v-stepper-content>

    <v-stepper-step editable step="6">Resume</v-stepper-step>
    <v-stepper-content step="6">
      <v-layout align-center justify-center>
        <v-flex style="text-align:center;">
          <v-avatar v-if="src" color="grey lighten-4" class="mb-3" size="90">
            <img :src="src" alt="avatar" />
          </v-avatar>
        </v-flex>
      </v-layout>

      <h3 class="mb-3">Contact Details</h3>
      <v-layout class="ml-3" wrap>
        <v-flex xs12 md4>
          <h5>First name:</h5>
          <p>{{contactDetails.name}}</p>

          <h5>Last name:</h5>
          <p>{{contactDetails.lastname}}</p>
        </v-flex>
        <v-flex xs12 md4>
          <h5>Email:</h5>
          <p>{{contactDetails.email}}</p>

          <h5>Phone:</h5>
          <p>{{contactDetails.phone}}</p>
        </v-flex>
        <v-flex xs12 md4>
          <h5>Birthday:</h5>
          <p>{{contactDetails.birthdate}}</p>

          <h5>Codice Fiscale:</h5>
          <p>{{contactDetails.codiceFiscale}}</p>
        </v-flex>
      </v-layout>

      <h3 class="mb-3">Company Details</h3>
      <v-layout class="ml-3" wrap>
        <v-flex xs12 md4>
          <h5>Company name:</h5>
          <p>{{companyDetails.companyName}}</p>

          <h5>P.IVA:</h5>
          <p>{{companyDetails.piva}}</p>

          <h5>PEC:</h5>
          <p>{{companyDetails.pec}}</p>

          <h5>Codice Fiscale:</h5>
          <p>{{companyDetails.codiceFiscale}}</p>

          <h5>Telefono:</h5>
          <p>{{companyDetails.phone}}</p>
        </v-flex>
        <v-flex xs12 md4>
          <h5>Numero Civico:</h5>
          <p>{{companyDetails.numeroCivico}}</p>

          <h5>Sito Web:</h5>
          <p>{{companyDetails.website}}</p>

          <h5>Indirizzo Sede Legale:</h5>
          <p>{{companyDetails.address}}</p>

          <h5>Stato:</h5>
          <p>{{companyDetails.state}}</p>
        </v-flex>
        <v-flex xs12 md4>
          <h5>Regione:</h5>
          <p>{{companyDetails.region}}</p>

          <h5>Provincia:</h5>
          <p>{{companyDetails.province}}</p>

          <h5>Città:</h5>
          <p>{{companyDetails.city}}</p>

          <h5>CAP:</h5>
          <p>{{companyDetails.cap}}</p>
        </v-flex>
      </v-layout>

      <h3 class="mb-3">Plan</h3>
      <v-layout class="ml-3" wrap>
        <v-flex xs12 md4>
          <h5>Plan Selected</h5>
          <p>{{planSelected}}</p>
        </v-flex>
      </v-layout>

      <h3 class="mb-3">Payment</h3>
      <v-layout class="ml-3" wrap>
        <v-flex md4>
          <h5>Come vuoi ricevere la fattura?</h5>
          <p>{{payment.whereTo}}</p>

          <h5>InfoPay</h5>
          <p>{{payment.infopay}}</p>
        </v-flex>
      </v-layout>

      <v-btn block class="mt-5" color="primary" @click="handleSubmit">Confirm</v-btn>
    </v-stepper-content>
  </v-stepper>
</template>

<script>
// import PictureInput from "vue-picture-input";
// import myUpload from "vue-image-crop-upload";
// import VueCropper from "vue-cropperjs";
// import "cropperjs/dist/cropper.css";
import VueCoreImageUpload from "vue-core-image-upload";
import axios from "axios";
export default {
  components: {
    // PictureInput
    // VueCropper,
    "vue-core-image-upload": VueCoreImageUpload
    // "my-upload": myUpload
  },
  data() {
    return {
      formData: new FormData(),
      file: null,
      src: null,
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
      payment: {
        whereTo: null,
        infopay: null
      },
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
    handleSubmit() {
      this.formData.set("name", this.contactDetails.name);
      this.formData.set("lastname", this.contactDetails.lastname);
      this.formData.set("email", this.contactDetails.email);
      this.formData.set("phone", this.contactDetails.phone);
      this.formData.set("codiceFiscale", this.contactDetails.codiceFiscale);
      this.formData.set("birthdate", this.contactDetails.birthdate);
      this.formData.set("companyName", this.companyDetails.companyName);
      this.formData.set("piva", this.companyDetails.piva);
      this.formData.set(
        "companyCodiceFiscale",
        this.companyDetails.codiceFiscale
      );
      this.formData.set("state", this.companyDetails.state);
      this.formData.set("region", this.companyDetails.region);
      this.formData.set("province", this.companyDetails.province);
      this.formData.set("city", this.companyDetails.city);
      this.formData.set("address", this.companyDetails.address);
      this.formData.set("numeroCivico", this.companyDetails.numeroCivico);
      this.formData.set("cap", this.companyDetails.cap);
      this.formData.set("website", this.companyDetails.website);
      this.formData.set("pec", this.companyDetails.pec);
      this.formData.set("planSelected", this.planSelected);
      this.formData.set("whereTo", this.payment.whereTo);
      this.formData.set("infoPay", this.payment.infoPay);
      this.formData.append("file0", this.file, this.file.name);

      axios
        .post(
          window.location.hostname !== "localhost"
            ? "//demo.condivision.cloud/fl_api/registerApi.php"
            : "http://localhost:80/register-form/registerApi.php",
          this.formData,
          {
            headers: {
              "Content-Type": "multipart/form-data"
            }
          }
        )
        .then(function(response) {
          console.log("saved successfully");
          console.log(response.data);
        });
    },
    handleFree() {
      this.planSelected = "Free";
      this.currentStep = 5;
    },
    handlePlanA() {
      this.planSelected = "Plan A";
      this.currentStep = 4;
    },
    handlePlanB() {
      this.planSelected = "Plan B";
      this.currentStep = 4;
    },
    imagechanged(res) {
      this.src = res;
      let base64ImageContent = res.replace(
        /^data:image\/(png|jpg|jpeg);base64,/,
        ""
      );
      let blob = this.base64ToBlob(base64ImageContent, "image/jpeg");
      console.log("blob", blob);
      this.formData.set("picture", blob);
      console.log("imagechanged", this.formData);
    },
    base64ToBlob(base64, mime) {
      mime = mime || "";
      var sliceSize = 1024;
      var byteChars = window.atob(base64);
      var byteArrays = [];

      for (
        var offset = 0, len = byteChars.length;
        offset < len;
        offset += sliceSize
      ) {
        var slice = byteChars.slice(offset, offset + sliceSize);

        var byteNumbers = new Array(slice.length);
        for (var i = 0; i < slice.length; i++) {
          byteNumbers[i] = slice.charCodeAt(i);
        }

        var byteArray = new Uint8Array(byteNumbers);

        byteArrays.push(byteArray);
      }

      return new Blob(byteArrays, { type: mime });
    },
    imageuploading(res) {
      this.file = res;
      // var reader = new FileReader();

      // this.src = URL.createObjectURL(res);
      // // console.log("file", result);
      console.log("imageuploading", res);
    },
    imageuploaded(res) {
      console.log("imageuploaded", res);
    },
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

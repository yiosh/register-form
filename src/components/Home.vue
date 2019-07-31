<template>
  <v-container>
    <v-stepper v-model="currentStep" vertical>
      <v-stepper-step
        color="#d21919"
        editable
        :complete="currentStep > 1"
        step="1"
        >Contatto</v-stepper-step
      >

      <v-stepper-content step="1">
        <v-card class="mb-3" flat>
          <v-form v-model="valid">
            <v-container fluid>
              <v-layout wrap>
                <v-flex xs12 md6>
                  <v-text-field
                    v-model="contactDetails.name"
                    prepend-icon="mdi-account"
                    label="Nome"
                    required
                  ></v-text-field>
                  <v-text-field
                    v-model="contactDetails.lastname"
                    prepend-icon="mdi-account"
                    label="Cognome"
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
                    prepend-icon="mdi-cellphone"
                    label="Telefono"
                    required
                  ></v-text-field>

                  <v-text-field
                    v-model="contactDetails.codiceFiscale"
                    prepend-icon="mdi-account-card-details"
                    label="Codice Fiscale"
                    required
                  ></v-text-field>

                  <v-menu
                    ref="menu"
                    v-model="menu"
                    :close-on-content-click="false"
                    :nudge-right="40"
                    lazy
                    transition="scale-transition"
                    offset-y
                    full-width
                    min-width="290px"
                  >
                    <template v-slot:activator="{ on }">
                      <v-text-field
                        v-model="birthdateFormatted"
                        persistent-hint
                        label="Data di Nascita"
                        prepend-icon="event"
                        readonly
                        v-on="on"
                      ></v-text-field>
                    </template>
                    <v-date-picker
                      v-model="contactDetails.birthdate"
                      @input="menu = false"
                    >
                      <!-- <v-spacer></v-spacer>
                      <v-btn flat color="primary" @click="menu = false">Chiudi</v-btn>
                      <v-btn
                        flat
                        color="primary"
                        @click="$refs.menu.save(contactDetails.birthdate)"
                      >OK</v-btn>-->
                    </v-date-picker>
                  </v-menu>
                </v-flex>
              </v-layout>
            </v-container>
          </v-form>
        </v-card>
        <v-btn block color="success" @click="currentStep = 2">Continua</v-btn>
      </v-stepper-content>

      <v-stepper-step
        color="#d21919"
        editable
        :complete="currentStep > 2"
        step="2"
        >Azienda</v-stepper-step
      >

      <v-stepper-content step="2">
        <v-card class="mb-3" flat>
          <v-form v-model="valid">
            <v-container fluid>
              <v-layout wrap>
                <v-flex xs12 md6>
                  <v-text-field
                    v-model="companyDetails.companyName"
                    prepend-icon="mdi-account"
                    label="Nome dell'azienda"
                    required
                  ></v-text-field>

                  <v-text-field
                    v-model="companyDetails.piva"
                    prepend-icon="mdi-file-document-box"
                    label="P.IVA"
                    required
                  ></v-text-field>

                  <v-text-field
                    v-model="companyDetails.codiceFiscale"
                    prepend-icon="mdi-file-document-box"
                    label="Codice Fiscale"
                    required
                  ></v-text-field>

                  <v-text-field
                    v-model="companyDetails.phone"
                    prepend-icon="mdi-phone"
                    label="Telefono"
                    required
                  ></v-text-field>

                  <v-text-field
                    v-model="companyDetails.email"
                    prepend-icon="mdi-email"
                    label="E-mail"
                    required
                  ></v-text-field>

                  <v-text-field
                    v-model="companyDetails.website"
                    prepend-icon="mdi-web"
                    label="Sito Web"
                    required
                  ></v-text-field>

                  <v-text-field
                    v-model="companyDetails.pec"
                    prepend-icon="mdi-email"
                    label="PEC"
                    required
                  ></v-text-field>
                </v-flex>

                <v-flex xs12 md6>
                  <v-text-field
                    v-model="companyDetails.state"
                    prepend-icon="mdi-map-marker"
                    label="Stato"
                    required
                  ></v-text-field>

                  <v-select
                    prepend-icon="mdi-map-marker"
                    :items="regions"
                    item-text="region_description"
                    item-value="id"
                    :loading="loaders.region"
                    v-model="companyDetails.region"
                    @change="handleRegionChange(companyDetails.region)"
                    label="Regione"
                  ></v-select>

                  <v-select
                    prepend-icon="mdi-map-marker"
                    :disabled="disabled.provinces"
                    :items="provinces"
                    item-text="provincia"
                    item-value="provincia"
                    v-model="companyDetails.province"
                    @change="handleProvinceChange(companyDetails.province)"
                    label="Provincia"
                  ></v-select>

                  <v-select
                    prepend-icon="mdi-map-marker"
                    ref="cityField"
                    :disabled="disabled.cities"
                    :items="cities"
                    item-text="comune"
                    item-value="id"
                    v-model="companyDetails.city"
                    @change="handleCityChange(companyDetails.city)"
                    label="Comune"
                  ></v-select>

                  <v-text-field
                    v-model="companyDetails.cap"
                    prepend-icon="mdi-map-marker"
                    label="CAP"
                    required
                  ></v-text-field>

                  <v-text-field
                    ref="addressField"
                    v-model="companyDetails.address"
                    prepend-icon="mdi-map-marker"
                    label="Indirizzo Sede Legale"
                    required
                  ></v-text-field>

                  <v-text-field
                    v-model="companyDetails.numeroCivico"
                    prepend-icon="mdi-counter"
                    label="Numero Civico"
                    required
                  ></v-text-field>
                </v-flex>
              </v-layout>
            </v-container>
          </v-form>
        </v-card>
        <v-btn block color="success" @click="currentStep = 4">Continua</v-btn>
      </v-stepper-content>

      <!-- <v-stepper-step editable :complete="currentStep > 3" step="3">Seleziona il piano</v-stepper-step>

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
      </v-stepper-content>-->

      <v-stepper-step
        color="#d21919"
        editable
        :complete="currentStep > 4"
        step="4"
        >Fatturazione</v-stepper-step
      >
      <v-stepper-content step="4">
        <v-card class="mb-3" flat>
          <!-- <h3>
            Sei soggetto a fatturazione elettronica?
            <v-radio-group v-model="payment.whereTo">
              <v-radio label="PEC" value="pec"></v-radio>
              <v-radio label="Codice SDI" value="codice_sdi"></v-radio>
            </v-radio-group>
          </h3>
          <h3>Come vuoi ricevere la fattura?</h3> -->
          <v-layout wrap>
            <v-flex>
              <h3>Sei soggetto a fatturazione elettronica?</h3>
              <v-radio-group v-model="payment.fatturaElettronica">
                <v-radio label="Si" value="1"></v-radio>
                <v-radio label="No" value="0"></v-radio>
              </v-radio-group>
            </v-flex>
            <v-flex>
              <h3 v-if="payment.fatturaElettronica == '1'">
                Come vuoi ricevere la fattura?
              </h3>
              <v-radio-group
                v-if="payment.fatturaElettronica == '1'"
                v-model="payment.whereTo"
              >
                <v-radio label="PEC" value="pec"></v-radio>
                <v-radio label="Codice SDI" value="codice_sdi"></v-radio>
              </v-radio-group>
            </v-flex>
            <v-flex>
              <v-text-field
                v-if="
                  payment.whereTo == 'pec' && payment.fatturaElettronica == '1'
                "
                v-model="payment.pec"
                prepend-icon="mdi-map-marker"
                label="Inserisci PEC"
                required
              ></v-text-field>
              <v-text-field
                v-if="
                  payment.whereTo == 'codice_sdi' &&
                    payment.fatturaElettronica == '1'
                "
                v-model="payment.codice_sdi"
                prepend-icon="mdi-map-marker"
                label="Inserisci codice SDI"
                required
              ></v-text-field>
            </v-flex>
          </v-layout>
          <h3>Come vuoi pagare?</h3>
          <v-radio-group v-model="payment.metodoPagamento">
            <v-radio label="Bonifico Bancario" value="bonifico"></v-radio>
            <v-radio label="Ricarica GoServizi" value="ricarica"></v-radio>
          </v-radio-group>
          <v-btn block color="success" @click="currentStep = 6">Continua</v-btn>
        </v-card>
      </v-stepper-content>

      <!-- <v-stepper-step editable step="5">Logo della compagnia</v-stepper-step>
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
            <v-btn color="primary" type="file">Carica immagine</v-btn>
          </vue-core-image-upload>
          <v-card-text>
            <v-avatar v-if="src" color="grey lighten-4" class="mb-3" size="90">
              <img :src="src" alt="avatar" />
            </v-avatar>
            <p v-if="file">{{ file.name }}</p>
          </v-card-text>
        </v-card>
        <v-btn color="success" @click="currentStep = 6">Continue</v-btn>
        <v-btn color="primary" flat @click="currentStep = 6">Skip</v-btn>
      </v-stepper-content>-->

      <v-stepper-step color="#d21919" editable step="6">
        Riepilogo Dati
      </v-stepper-step>
      <v-stepper-content step="6">
        <v-layout align-center justify-center>
          <v-flex style="text-align:center;">
            <!-- <v-avatar v-if="src" color="grey lighten-4" class="mb-3" size="90">
              <img :src="src" alt="avatar" />
            </v-avatar>-->
          </v-flex>
        </v-layout>

        <h3 class="mb-3">Dettagli del contatto</h3>
        <v-layout class="ml-3" wrap>
          <v-flex xs12 md4>
            <h5>Nome:</h5>
            <p>{{ contactDetails.name }}</p>

            <h5>Cognome:</h5>
            <p>{{ contactDetails.lastname }}</p>
          </v-flex>
          <v-flex xs12 md4>
            <h5>E-mail:</h5>
            <p>{{ contactDetails.email }}</p>

            <h5>Telefono:</h5>
            <p>{{ contactDetails.phone }}</p>
          </v-flex>
          <v-flex xs12 md4>
            <h5>Data di Nascita:</h5>
            <p>{{ birthdateFormatted }}</p>

            <h5>Codice Fiscale:</h5>
            <p>{{ contactDetails.codiceFiscale }}</p>
          </v-flex>
        </v-layout>

        <h3 class="mb-3">Dettagli della Compagnia</h3>
        <v-layout class="ml-3" wrap>
          <v-flex xs12 md4>
            <h5>Nome dell'azienda:</h5>
            <p>{{ companyDetails.companyName }}</p>

            <h5>P.IVA:</h5>
            <p>{{ companyDetails.piva }}</p>

            <h5>PEC:</h5>
            <p>{{ companyDetails.pec }}</p>

            <h5>Codice Fiscale:</h5>
            <p>{{ companyDetails.codiceFiscale }}</p>

            <h5>Telefono:</h5>
            <p>{{ companyDetails.phone }}</p>
          </v-flex>
          <v-flex xs12 md4>
            <h5>Numero Civico:</h5>
            <p>{{ companyDetails.numeroCivico }}</p>

            <h5>Sito Web:</h5>
            <p>{{ companyDetails.website }}</p>

            <h5>Indirizzo Sede Legale:</h5>
            <p>{{ companyDetails.address }}</p>

            <!-- <h5>Stato:</h5>
            <p>{{companyDetails.state}}</p>-->
          </v-flex>
          <v-flex xs12 md4>
            <h5>Regione:</h5>
            <p>{{ selectedRegion }}</p>

            <h5>Provincia:</h5>
            <p>{{ companyDetails.province }}</p>

            <h5>Città:</h5>
            <p>{{ selectedCity }}</p>

            <h5>CAP:</h5>
            <p>{{ companyDetails.cap }}</p>
          </v-flex>
        </v-layout>

        <!-- <h3 class="mb-3">Plan</h3>
        <v-layout class="ml-3" wrap>
          <v-flex xs12 md4>
            <h5>Plan Selected</h5>
            <p>{{planSelected}}</p>
          </v-flex>
        </v-layout>-->

        <h3 class="mb-3">Pagamento</h3>
        <v-layout class="ml-3" wrap>
          <v-flex md4>
            <h5 v-if="payment.fatturaElettronica == '1'">
              Come vuoi ricevere la fattura?
            </h5>
            <p v-if="payment.fatturaElettronica == '1'">
              {{ payment.whereTo }}
            </p>

            <h5
              v-if="
                payment.pec &&
                  payment.whereTo == 'pec' &&
                  payment.fatturaElettronica == '1'
              "
            >
              PEC
            </h5>
            <p
              v-if="
                payment.pec &&
                  payment.whereTo == 'pec' &&
                  payment.fatturaElettronica == '1'
              "
            >
              {{ payment.pec }}
            </p>

            <h5
              v-if="
                payment.codice_sdi &&
                  payment.whereTo == 'codice_sdi' &&
                  payment.fatturaElettronica == '1'
              "
            >
              Codice SDI
            </h5>
            <p
              v-if="
                payment.codice_sdi &&
                  payment.whereTo == 'codice_sdi' &&
                  payment.fatturaElettronica == '1'
              "
            >
              {{ payment.codice_sdi }}
            </p>

            <h5>Come vuoi Pagare</h5>
            <p>{{ payment.metodoPagamento }}</p>

          </v-flex>
        </v-layout>

        <h3 >Privacy</h3>
        <v-layout class="ml-3" wrap>
          <v-flex>
            <v-checkbox
              v-model="privacy.accettazione_condizioni_del_servizio"
              :rules="[v => !!v || 'Richiesto']"
              label="Ho letto ed accetto le condizioni generali del servizio."
              required
            ></v-checkbox>
            <span style="font-size: smaller;">
              Leggi le condizioni generali del servizio prima di procedere.
            </span>
          </v-flex>

          <v-flex>
            <v-checkbox
              v-model="privacy.gdpr_consenso_trattamento1"
              :rules="[v => !!v || 'Richiesto']"
              label="Presto il consenso al trattamento ai fini della registrazione."
              required
            ></v-checkbox>
            <span style="font-size: smaller;">
              Ai Sensi del GDPR 2016/679 Ti informiamo che tratteremo questi dati al
              solo scopo di procedere alla pre-registrazione al servizio e per
              comunicare con te relativamente all'attivazione e configurazione dello
              stesso. Se non completerai il processo entro 30 giorni, li
              cancelleremo automaticamente.
            </span>
          </v-flex>

          <v-flex>
            <v-checkbox
              v-model="privacy.gdpr_consenso_trattamento2"
              label="Presto il consenso al trattamento ai fini delle comunicazioni
          promozionali/marketing."
            ></v-checkbox>
            <span style="font-size: smaller;">
              Ai Sensi del GDPR 2016/679 Ti informiamo che tratteremo questi dati al
          solo scopo di procedere alla pre-registrazione al servizio e per
          comunicare con te relativamente all'attivazione e configurazione dello
          stesso. Se non completerai il processo entro 30 giorni, li
          cancelleremo automaticamente.
            </span>
          </v-flex>

          <v-flex>
            <v-checkbox
              v-model="privacy.gdpr_consenso_trattamento3"
              label="Presto il consenso al trattamento ai fini della profilazione."
            ></v-checkbox>
            <span style="font-size: smaller;">
              Ai Sensi del GDPR 2016/679 Ti informiamo che tratteremo questi dati al
          solo scopo di procedere alla pre-registrazione al servizio e per
          comunicare con te relativamente all'attivazione e configurazione dello
          stesso. Se non completerai il processo entro 30 giorni, li
          cancelleremo automaticamente.
            </span>
          </v-flex>
        </v-layout>

        <v-btn block dark class="mt-5" color="#d21919" @click="handleSubmit">
          Conferma
        </v-btn>

      </v-stepper-content>
    </v-stepper>
  </v-container>
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
  data: vm => {
    return {
      dateFormatted: vm.formatDate(new Date().toISOString().substr(0, 10)),
      formData: new FormData(),
      regions: [],
      provinces: [],
      cities: [],
      file: null,
      src: null,
      panel: [true, true, true, true],
      items: 5,
      currentStep: 1,
      menu: false,
      modal: false,
      show: false,
      valid: true,
      loaders: {
        region: false
      },
      disabled: {
        provinces: true,
        cities: true
      },
      nameRules: [
        v => !!v || "Name is required",
        v => v.length <= 10 || "Name must be less than 10 characters"
      ],
      emailRules: [
        v => !!v || "Email obbligatoria",
        v => /.+@.+/.test(v) || "L'email deve essere valida"
      ],
      contactDetails: {
        birthdate: new Date().toISOString().substr(0, 10),
        name: "",
        lastname: "",
        email: "",
        phone: "",
        codiceFiscale: ""
      },
      companyDetails: {
        companyName: "",
        piva: "",
        codiceFiscale: "",
        state: "IT",
        region: "",
        province: "",
        city: "",
        address: "",
        numeroCivico: "",
        cap: "",
        phone: "",
        email: "",
        website: "",
        pec: ""
      },
      planSelected: "",
      payment: {
        fatturaElettronica: "",
        whereTo: "",
        infopay: "",
        codice_sdi: "",
        pec: "",
        metodoPagamento: ""
      },
      imgDataUrl: "",
      params: {
        token: "123456798",
        name: "avatar"
      },
      headers: {
        smail: "*_~"
      },
      privacy: {
        accettazione_condizioni_del_servizio: false,
        gdpr_consenso_trattamento1: false,
        gdpr_consenso_trattamento2: false,
        gdpr_consenso_trattamento3: false,
        gdpr_consenso_trattamento4: false
      },
      selectedRegion: "",
      selectedCity: "",
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
  computed: {
    birthdateFormatted() {
      return this.formatDate(this.contactDetails.birthdate);
    }
  },
  methods: {
    formatDate(date) {
      if (!date) return null;

      const [year, month, day] = date.split("-");
      return `${day}/${month}/${year}`;
    },
    parseDate(date) {
      if (!date) return null;

      const [month, day, year] = date.split("/");
      return `${year}-${month.padStart(2, "0")}-${day.padStart(2, "0")}`;
    },
    handleRegionChange(id) {
      this.loaders.region = true;
      const region = this.regions.filter(region => region.id == id);
      this.selectedRegion = region[0].region_description;
      axios
        .get(
          "https://mysql.condivision.cloud/countries/regions/province/?region=" +
            id
        )
        .then(response => {
          this.provinces = response.data;
          this.loaders.region = false;
          this.disabled.provinces = false;
          console.log(response);
        });
    },
    handleProvinceChange(province) {
      this.loaders.province = true;
      axios
        .get(
          "https://mysql.condivision.cloud/countries/regions/province/cities/?province=" +
            province
        )
        .then(response => {
          this.cities = response.data;
          this.loaders.province = false;
          this.disabled.cities = false;
          console.log(response);
        });
    },
    handleCityChange(id) {
      const selectedCity = this.cities.filter(city => city.id == id);
      this.companyDetails.cap = selectedCity[0].cap;
      this.selectedCity = selectedCity[0].comune;
      this.$refs.cityField.blur();
      this.$refs.addressField.focus();
      console.log("Selected City", selectedCity);
    },
    handleSubmit() {
      this.formData.set("nome", this.contactDetails.name);
      this.formData.set("cognome", this.contactDetails.lastname);
      this.formData.set("email_persona", this.contactDetails.email);
      this.formData.set("telefono_persona", this.contactDetails.phone);
      this.formData.set("codice_fiscale", this.contactDetails.codiceFiscale);
      this.formData.set("data_nascita", this.contactDetails.birthdate);
      this.formData.set("ragione_sociale", this.companyDetails.companyName);
      this.formData.set("partita_iva", this.companyDetails.piva);
      this.formData.set(
        "codice_fiscale_legale",
        this.companyDetails.codiceFiscale
      );
      this.formData.set("telefono", this.companyDetails.phone);
      this.formData.set("sito_web", this.companyDetails.website);
      this.formData.set("stato_sede", this.companyDetails.state);
      this.formData.set("regione_sede", this.companyDetails.region);
      this.formData.set("provincia_sede", this.companyDetails.province);
      this.formData.set("comune_sede", this.companyDetails.city);
      this.formData.set("cap_sede", this.companyDetails.cap);
      this.formData.set("indirizzo_sede_legale", this.companyDetails.address);
      this.formData.set("email", this.companyDetails.email);
      // this.formData.set("numero_civico", this.companyDetails.numeroCivico);
      this.formData.set("ricezione_fatture", this.payment.whereTo);
      this.formData.set("fattura_elettronica", this.payment.fatturaElettronica);
      // this.formData.set("metodo_di_pagamento", this.payment.metodoPagamento);
      this.formData.set("accettazione_condizioni_del_servizio", this.privacy.accettazione_condizioni_del_servizio);
      
      this.formData.set("gdpr_consenso_trattamento1", this.privacy.gdpr_consenso_trattamento1);
      this.formData.set("gdpr_consenso_trattamento2", this.privacy.gdpr_consenso_trattamento2);
      this.formData.set("gdpr_consenso_trattamento3", this.privacy.gdpr_consenso_trattamento3);
      this.formData.set("gdpr_consenso_trattamento4", this.privacy.gdpr_consenso_trattamento4);
      if (this.payment.codice_sdi != "") {
        this.formData.set("codice_destinatario", this.payment.codice_sdi);
      } else {
        this.formData.set("pec_destinatario", this.payment.pec);
      }
      // this.formData.set("info_pay", this.payment.infoPay);

      if (this.privacy.accettazione_condizioni_del_servizio && this.privacy.gdpr_consenso_trattamento1) {
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
            console.log("Response", response.data);
          })
          .catch(function(error) {
            // handle error
            console.log(error);
          });
      } else {
        alert("È necessario accettare le condizioni sulla privacy per continuare");
      }
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
  },
  created() {
    axios
      .get("https://mysql.condivision.cloud/countries/regions/?country=it")
      .then(response => {
        this.regions = response.data;
        console.log(response);
      });
  }
};
</script>

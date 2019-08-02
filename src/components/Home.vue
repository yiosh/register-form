<template>
  <v-container fill-height>
    <!-- <v-form v-model="valid"> -->
    <v-stepper v-if="!progress && !formSuccess" v-model="currentStep" vertical>
      <v-stepper-step
        color="#d21919"
        :editable="editable.contatto"
        :complete="currentStep > 1"
        step="1"
        >Contatto</v-stepper-step
      >

      <v-stepper-content step="1">
        <v-card class="mb-3" flat>
          <v-form ref="contattoForm" v-model="valid.contatto">
            <v-container fluid>
              <v-layout wrap>
                <v-flex xs12 md6>
                  <v-text-field
                    v-model="contactDetails.name"
                    prepend-icon="mdi-account"
                    label="Nome"
                    :rules="rules.nome"
                    required
                  ></v-text-field>
                  <v-text-field
                    v-model="contactDetails.lastname"
                    prepend-icon="mdi-account"
                    label="Cognome"
                    :rules="rules.cognome"
                    required
                  ></v-text-field>
                  <v-text-field
                    v-model="contactDetails.email"
                    :rules="rules.email"
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
                    :rules="rules.telefono"
                    required
                  ></v-text-field>

                  <v-text-field
                    v-model="contactDetails.codiceFiscale"
                    prepend-icon="mdi-account-card-details"
                    label="Codice Fiscale"
                    :rules="rules.codiceFiscale"
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
                      locale="it-it"
                      v-model="contactDetails.birthdate"
                      @input="menu = false"
                    >
                    </v-date-picker>
                  </v-menu>
                </v-flex>
              </v-layout>
            </v-container>
          </v-form>
        </v-card>
        <v-btn block color="success" @click="handleStep('Contatto')"
          >Continua</v-btn
        >
      </v-stepper-content>

      <v-stepper-step
        color="#d21919"
        :editable="editable.azienda"
        :complete="currentStep > 2"
        step="2"
        >Azienda</v-stepper-step
      >

      <v-stepper-content step="2">
        <v-card class="mb-3" flat>
          <v-form ref="aziendaForm" v-model="valid.azienda">
            <v-container fluid>
              <v-layout wrap>
                <v-flex xs12 md6>
                  <v-select
                    prepend-icon="mdi-account"
                    :items="formaGiuridica"
                    item-text="content"
                    item-value="content"
                    v-model="companyDetails.formaGiuridica"
                    label="Forma Giuridica"
                  ></v-select>

                  <v-text-field
                    v-model="companyDetails.companyName"
                    prepend-icon="mdi-account"
                    label="Nome dell'azienda"
                    :rules="rules.nomeAzienda"
                    required
                  ></v-text-field>

                  <v-text-field
                    v-model="companyDetails.piva"
                    prepend-icon="mdi-file-document-box"
                    label="P.IVA"
                    :rules="rules.piva"
                    required
                  ></v-text-field>

                  <v-text-field
                    v-model="companyDetails.codiceFiscale"
                    prepend-icon="mdi-file-document-box"
                    label="Codice Fiscale"
                    :rules="rules.codiceFiscale"
                    required
                  ></v-text-field>

                  <v-text-field
                    v-model="companyDetails.phone"
                    prepend-icon="mdi-phone"
                    label="Telefono"
                    :rules="rules.telefono"
                    required
                  ></v-text-field>

                  <v-text-field
                    v-model="companyDetails.email"
                    prepend-icon="mdi-email"
                    label="E-mail"
                    :rules="rules.email"
                    required
                  ></v-text-field>

                  <v-text-field
                    v-model="companyDetails.pec"
                    prepend-icon="mdi-email"
                    label="PEC"
                    :rules="rules.pec"
                    required
                  ></v-text-field>
                </v-flex>

                <v-flex xs12 md6>
                  <v-select
                    prepend-icon="mdi-map-marker"
                    :items="states"
                    v-model="companyDetails.state"
                    label="Stato"
                  ></v-select>

                  <v-select
                    prepend-icon="mdi-map-marker"
                    :items="regions"
                    item-text="region_description"
                    item-value="id"
                    locale="it"
                    :loading="loaders.region"
                    v-model="companyDetails.region"
                    @change="handleRegionChange(companyDetails.region)"
                    label="Regione"
                    :rules="rules.regione"
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
                    :rules="rules.provincia"
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
                    :rules="rules.comune"
                  ></v-select>

                  <v-text-field
                    v-model="companyDetails.cap"
                    prepend-icon="mdi-map-marker"
                    label="CAP"
                    :rules="rules.cap"
                    required
                  ></v-text-field>

                  <v-text-field
                    ref="addressField"
                    v-model="companyDetails.address"
                    prepend-icon="mdi-map-marker"
                    label="Indirizzo Sede Legale"
                    :rules="rules.indirizzoSede"
                    required
                  ></v-text-field>

                  <v-text-field
                    v-model="companyDetails.website"
                    prepend-icon="mdi-web"
                    label="Sito Web"
                  ></v-text-field>
                </v-flex>
              </v-layout>
            </v-container>
          </v-form>
        </v-card>
        <v-btn block color="success" @click="handleStep('Azienda')"
          >Continua</v-btn
        >
      </v-stepper-content>

      <v-stepper-step
        color="#d21919"
        :editable="editable.fatturazione"
        :complete="currentStep > 3"
        step="3"
        >Fatturazione</v-stepper-step
      >
      <v-stepper-content step="3">
        <v-card class="mb-3" flat>
          <v-form ref="fatturazioneForm" v-model="valid.fatturazione">
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
                    payment.whereTo == 'pec' &&
                      payment.fatturaElettronica == '1'
                  "
                  v-model="payment.pec"
                  prepend-icon="mdi-map-marker"
                  label="Inserisci PEC"
                  :rules="rules.pec"
                  required
                ></v-text-field>
                <v-text-field
                  v-if="
                    payment.whereTo == 'codice_sdi' &&
                      payment.fatturaElettronica == '1'
                  "
                  v-model="payment.codice_sdi"
                  :rules="rules.codiceSdi"
                  prepend-icon="mdi-map-marker"
                  label="Inserisci codice SDI"
                  required
                ></v-text-field>
              </v-flex>
            </v-layout>
            <h3>Come vuoi pagare?</h3>
            <v-radio-group v-model="payment.metodoPagamento">
              <v-radio label="Bonifico Bancario" value="bonifico"></v-radio>
            </v-radio-group>
            <v-btn block color="success" @click="handleStep('Fatturazione')"
              >Continua</v-btn
            >
          </v-form>
        </v-card>
      </v-stepper-content>

      <v-stepper-step
        color="#d21919"
        :editable="editable.riepilogoDati"
        step="4"
      >
        Riepilogo Dati
      </v-stepper-step>
      <v-stepper-content step="4">
        <h3 class="mb-3">Dettagli del Contatto</h3>
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

        <h3 class="mb-3">Dettagli dell'azienda</h3>
        <v-layout class="ml-3" wrap>
          <v-flex xs12 md4>
            <h5>Forma Giuridica:</h5>
            <p>{{ companyDetails.formaGiuridica }}</p>

            <h5>Nome dell'azienda:</h5>
            <p>{{ companyDetails.companyName }}</p>

            <h5>P.IVA:</h5>
            <p>{{ companyDetails.piva }}</p>

            <h5>PEC:</h5>
            <p>{{ companyDetails.pec }}</p>
          </v-flex>

          <v-flex xs12 md4>
            <h5>Sito Web:</h5>
            <p>{{ companyDetails.website }}</p>

            <h5>Indirizzo Sede Legale:</h5>
            <p>{{ companyDetails.address }}</p>

            <h5>Stato:</h5>
            <p>{{ companyDetails.state }}</p>

            <h5>Codice Fiscale:</h5>
            <p>{{ companyDetails.codiceFiscale }}</p>

            <h5>Telefono:</h5>
            <p>{{ companyDetails.phone }}</p>
          </v-flex>
          <v-flex xs12 md4>
            <h5>Regione:</h5>
            <p>{{ selectedRegion }}</p>

            <h5>Provincia:</h5>
            <p>{{ companyDetails.province }}</p>

            <h5>Citt&#224;:</h5>
            <p>{{ selectedCity }}</p>

            <h5>CAP:</h5>
            <p>{{ companyDetails.cap }}</p>
          </v-flex>
        </v-layout>

        <h3 class="mb-3">Detagli di Fatturazione</h3>
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

        <h3>Condizioni Generali del Servizio</h3>
        <v-layout class="ml-3" wrap>
          <v-flex>
            <v-checkbox
              v-model="privacy.accettazione_condizioni_del_servizio"
              :rules="[v => !!v || 'Obbligatorio']"
              label="Accetto le condizioni generali del servizio."
              required
            ></v-checkbox>
            <span style="font-size: smaller;">
              Leggi le condizioni generali del servizio prima di procedere.
            </span>
          </v-flex>
        </v-layout>

        <h3 style="margin-top: 1em;">Privacy</h3>
        <v-layout class="ml-3" wrap>
          <v-flex>
            <v-checkbox
              v-model="privacy.gdpr_consenso_trattamento1"
              :rules="[v => !!v || 'Obbligatorio']"
              label="Accetto il consenso al trattamento ai fini della registrazione."
              required
            ></v-checkbox>
            <span style="font-size: smaller;">
              Ai Sensi del GDPR 2016/679 Ti informiamo che tratteremo questi
              dati al solo scopo di procedere alla pre-registrazione al servizio
              e per comunicare con te relativamente all'attivazione e
              configurazione dello stesso. Se non completerai il processo entro
              30 giorni, li cancelleremo automaticamente.
            </span>
          </v-flex>

          <v-flex>
            <v-checkbox
              v-model="privacy.gdpr_consenso_trattamento2"
              label="Accetto il consenso al trattamento ai fini delle comunicazioni
            promozionali/marketing."
            ></v-checkbox>
            <span style="font-size: smaller;">
              Ai Sensi del GDPR 2016/679 Ti informiamo che tratteremo questi
              dati al solo scopo di procedere alla pre-registrazione al servizio
              e per comunicare con te relativamente all'attivazione e
              configurazione dello stesso. Se non completerai il processo entro
              30 giorni, li cancelleremo automaticamente.
            </span>
          </v-flex>

          <v-flex>
            <v-checkbox
              v-model="privacy.gdpr_consenso_trattamento3"
              label="Accetto il consenso al trattamento ai fini della profilazione."
            ></v-checkbox>
            <span style="font-size: smaller;">
              Ai Sensi del GDPR 2016/679 Ti informiamo che tratteremo questi
              dati al solo scopo di procedere alla pre-registrazione al servizio
              e per comunicare con te relativamente all'attivazione e
              configurazione dello stesso. Se non completerai il processo entro
              30 giorni, li cancelleremo automaticamente.
            </span>
          </v-flex>
        </v-layout>

        <v-btn block dark class="mt-5" color="#d21919" @click="handleSubmit">
          Conferma
        </v-btn>
      </v-stepper-content>
    </v-stepper>
    <!-- </v-form> -->

    <v-layout
      v-if="progress && !formSuccess"
      fill-height
      align-center
      justify-center
      column
    >
      <v-progress-circular
        :size="70"
        :width="7"
        color="red"
        indeterminate
      ></v-progress-circular>
      <br />
      <p>Stiamo elaborando i tuoi dati</p>
    </v-layout>

    <v-layout
      v-if="!progress && formSuccess"
      fill-height
      align-center
      justify-center
    >
      <v-card height="20em" width="25em" class="mx-auto">
        <v-card-title></v-card-title>

        <v-card-text
          style="text-align: center;"
          class="headline font-weight-bold"
        >
          <v-icon color="success" size="5em">mdi-check-bold</v-icon>
          <!-- <br /> -->
          <p>Procedura completata!</p>
          <p style="font-size: .5em;">
            Tra {{ counter }} secondi sarai reindirizzato alla
            <a style="color: rgb(192, 0, 0);" :href="origin">piattaforma.</a>
          </p>
        </v-card-text>
      </v-card>
    </v-layout>
  </v-container>
</template>

<script>
import axios from "axios";
import { setTimeout } from "timers";
export default {
  data: vm => {
    return {
      valid: {
        contatto: true,
        azienda: true,
        fatturazione: true
      },
      editable: {
        contatto: false,
        azienda: false,
        fatturazione: false,
        riepilogoDati: false
      },
      rules: {
        nome: [v => !!v || "Nome obbligatorio"],
        cognome: [v => !!v || "Cognome obbligatorio"],
        telefono: [v => !!v || "Telefono obbligatorio"],
        codiceFiscale: [v => !!v || "Nome obbligatorio"],
        codiceSdi: [
          v => v.length <= 7 || "Massimo 7 caratteri",
          v => !!v || "Obbligatorio"
        ],
        email: [
          v => !!v || "Email obbligatoria",
          v => /.+@.+/.test(v) || "L'email deve essere valida"
        ],
        nomeAzienda: [v => !!v || "Nome dell'azienda obbligatorio"],
        piva: [v => !!v || "P.IVA obbligatoria"],
        pec: [v => !!v || "PEC obbligatorio"],
        cap: [v => !!v || "CAP obbligatorio"],
        indirizzoSede: [v => !!v || "Indirizzo sede legale obbligatorio"],
        regione: [v => !!v || "Regione obbligatorio"],
        provincia: [v => !!v || "Provincia obbligatorio"],
        comune: [v => !!v || "Comune obbligatorio"]
      },
      origin: location.origin,
      counter: 3,
      overlay: true,
      states: ["IT"],
      formSuccess: false,
      progress: false,
      dateFormatted: vm.formatDate(new Date().toISOString().substr(0, 10)),
      formData: new FormData(),
      regions: [],
      provinces: [],
      cities: [],
      src: null,
      panel: [true, true, true, true],
      currentStep: 1,
      menu: false,
      modal: false,
      show: false,
      loaders: {
        region: false
      },
      disabled: {
        provinces: true,
        cities: true
      },
      formaGiuridica: [],
      contactDetails: {
        birthdate: new Date().toISOString().substr(0, 10),
        name: "",
        lastname: "",
        email: "",
        phone: "",
        codiceFiscale: ""
      },
      companyDetails: {
        formaGiuridica: "Societ\u00e0",
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
        metodoPagamento: "bonifico"
      },
      privacy: {
        accettazione_condizioni_del_servizio: false,
        gdpr_consenso_trattamento1: false,
        gdpr_consenso_trattamento2: false,
        gdpr_consenso_trattamento3: false,
        gdpr_consenso_trattamento4: false
      },
      selectedRegion: "",
      selectedCity: ""
    };
  },
  computed: {
    birthdateFormatted() {
      return this.formatDate(this.contactDetails.birthdate);
    }
  },
  methods: {
    handleStep(stepName) {
      if (stepName == "Contatto" && this.valid.contatto) {
        this.$refs.aziendaForm.resetValidation();
        this.currentStep = 2;
        this.editable.contatto = true;
      } else {
        this.$refs.contattoForm.validate();
      }

      if (stepName == "Azienda" && this.valid.azienda) {
        this.$refs.fatturazioneForm.resetValidation();
        this.currentStep = 3;
        this.editable.azienda = true;
      } else {
        this.$refs.aziendaForm.validate();
      }

      if (stepName == "Fatturazione" && this.valid.fatturazione) {
        this.currentStep = 4;
        this.editable.fatturazione = true;
        this.editable.riepilogoDati = true;
      } else {
        this.$refs.fatturazioneForm.validate();
      }
    },
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
    handleStateChange() {
      axios
        .get("https://mysql.condivision.cloud/data/?tag=forma_giuridica")
        .then(response => {
          this.formaGiuridica = response.data;
          // this.loaders.region = false;
          // this.disabled.provinces = false;
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
      this.formData.set("updateAnagrafica", "1");
      this.formData.set("token", "1");
      this.formData.set("nome", this.contactDetails.name);
      this.formData.set("cognome", this.contactDetails.lastname);
      this.formData.set("email_persona", this.contactDetails.email);
      this.formData.set("telefono_persona", this.contactDetails.phone);
      this.formData.set("codice_fiscale", this.contactDetails.codiceFiscale);
      this.formData.set("data_nascita", this.contactDetails.birthdate);
      this.formData.set("forma_giuridica", this.companyDetails.formaGiuridica);
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
      if (this.selectedCity) {
        this.formData.set("comune_sede", this.selectedCity[0].comune);
      }
      this.formData.set("cap_sede", this.companyDetails.cap);
      this.formData.set("indirizzo_sede_legale", this.companyDetails.address);
      this.formData.set("email", this.companyDetails.email);
      // this.formData.set("numero_civico", this.companyDetails.numeroCivico);
      this.formData.set("ricezione_fatture", this.payment.whereTo);
      this.formData.set("fattura_elettronica", this.payment.fatturaElettronica);
      // this.formData.set("metodo_di_pagamento", this.payment.metodoPagamento);
      this.formData.set(
        "accettazione_condizioni_del_servizio",
        this.privacy.accettazione_condizioni_del_servizio ? 1 : 0
      );

      this.formData.set(
        "gdpr_consenso_trattamento1",
        this.privacy.gdpr_consenso_trattamento1 ? 1 : 0
      );
      this.formData.set(
        "gdpr_consenso_trattamento2",
        this.privacy.gdpr_consenso_trattamento2 ? 1 : 0
      );
      this.formData.set(
        "gdpr_consenso_trattamento3",
        this.privacy.gdpr_consenso_trattamento3 ? 1 : 0
      );
      this.formData.set(
        "gdpr_consenso_trattamento4",
        this.privacy.gdpr_consenso_trattamento4 ? 1 : 0
      );
      if (this.payment.codice_sdi != "") {
        this.formData.set("codice_destinatario", this.payment.codice_sdi);
      } else {
        this.formData.set("pec_destinatario", this.payment.pec);
      }

      if (
        this.privacy.accettazione_condizioni_del_servizio &&
        this.privacy.gdpr_consenso_trattamento1
      ) {
        this.progress = true;
        axios
          .post(
            location.hostname == "localhost"
              ? "//secure.1x2live.it/fl_api/"
              : "//" + location.hostname + "/fl_api/",
            this.formData,
            {
              headers: {
                "Content-Type": "multipart/form-data"
              }
            }
          )
          .then(response => {
            if (response.data.esito == "OK") {
              this.progress = false;
              this.formSuccess = true;

              setTimeout(() => {
                window.location.href = location.origin;
              }, 3000);
            }
            console.log("Response", response);
          })
          .catch(function(error) {
            // handle error
            console.log(error);
          });
      } else if (!this.privacy.accettazione_condizioni_del_servizio) {
        alert("Devi accettare le Condizioni Generali del Servizio");
      } else if (!this.privacy.gdpr_consenso_trattamento1) {
        alert(
          "Devi accettare il consenso al trattamento ai fini della registrazione"
        );
      }
    }
  },
  created() {
    this.handleStateChange();
    axios
      .get("https://mysql.condivision.cloud/countries/regions/?country=it")
      .then(response => {
        this.regions = response.data;
        console.log(response);
      });
  }
};
</script>

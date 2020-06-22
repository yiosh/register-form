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
      </v-toolbar-title>-->

      <v-img :src="src" max-height="100%" contain style="margin: 0 auto"></v-img>

      <v-toolbar-items></v-toolbar-items>
    </v-toolbar>

    <v-content>
      <v-dialog v-model="dialog" width="700">
        <template v-slot:activator="{ on }">
          <v-btn color="red lighten-2" dark v-on="on">Click Me</v-btn>
        </template>

        <v-card>
          <v-card-title class="headline grey lighten-2" primary-title>Privacy Policy</v-card-title>

          <v-card-text>
            <v-container id="scroll-target" style="max-height: 400px" class="scroll-y">
              <v-layout
                v-scroll:#scroll-target="onScroll"
                column
                align-center
                justify-center
                style="height: 1000px"
              >
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe neque enim nihil repellendus illo dolore explicabo commodi porro mollitia sit asperiores quo maxime, pariatur assumenda quasi ea tenetur, eveniet architecto?
                Illo dicta perspiciatis vero inventore dolorum, maxime ad in, commodi blanditiis consectetur corrupti temporibus! Accusamus nisi, porro libero harum in ea eius temporibus quos, tempore minus omnis nemo inventore fugit!
                Nam eveniet saepe necessitatibus non earum dolore, ex culpa officiis? Quos molestiae debitis quas tenetur modi quaerat voluptate sunt aut cupiditate? Inventore rerum excepturi nesciunt quasi at aperiam a quo?
                Vitae maiores cupiditate molestiae nobis ipsum dolore quo repellendus eius eaque. Nostrum, laboriosam deleniti quis illum illo officiis, suscipit corrupti mollitia reiciendis, et odio? Nisi perferendis accusantium placeat quisquam repudiandae.
                Exercitationem omnis nisi neque quam dicta id atque labore nemo incidunt. Temporibus, sunt nostrum quod, dolorum deserunt repellat architecto quaerat, in placeat porro consequuntur laudantium ab quas sapiente eveniet incidunt.
                Fugit saepe ipsam quod, rerum aperiam amet exercitationem, tempore, ea iure sit voluptates. Laboriosam praesentium vel incidunt voluptas fuga facilis quam, quo provident eaque tenetur animi quis consequatur error doloremque!
                Iure harum dicta obcaecati, rem atque dolorem voluptas quis delectus provident nemo soluta accusamus eligendi, omnis voluptates quas doloremque voluptatibus nam porro numquam quod? Necessitatibus facere accusantium recusandae dolore ipsa.
                Eveniet fugit, ullam, sint voluptates ab incidunt maxime quis eum soluta dicta aspernatur neque animi ut dolores dolorum aliquam molestias consequuntur fuga voluptas doloremque. Ut repellat quae magni exercitationem porro!
                Possimus optio modi, vel dolore nobis necessitatibus quam ipsam quae exercitationem nesciunt assumenda quis quo temporibus iste nam odio delectus, quos, voluptatum quaerat autem itaque. Quod et ea rem quia.
                Ab totam tempore laudantium sequi tempora. Esse expedita reprehenderit maxime iure officiis? Officia obcaecati quos commodi, dolorum beatae ratione placeat ab magni. Voluptates, delectus. Earum in aperiam at voluptatem. Commodi.
                Rerum dolor quis libero deserunt aut ullam iure, similique illo maiores quo adipisci fuga repellendus possimus, officia modi cupiditate nemo? Hic tempore reprehenderit exercitationem delectus consequuntur, nihil ipsum alias quo?
                Impedit repudiandae quis saepe est sequi, nostrum aliquam earum, modi veniam maxime, voluptatum natus veritatis. Esse iure magnam provident mollitia quaerat, nisi accusamus quibusdam quae. Rerum laudantium autem pariatur aliquid?
                Accusantium dicta culpa totam tempora nesciunt nulla qui, quae dolore cum, voluptate velit possimus necessitatibus repellat cumque, commodi dolorum laborum tempore sed. Ad, quae magni sequi aliquam exercitationem expedita accusantium?
                Reprehenderit earum consequatur optio saepe illo, aliquid sit odio a! Repellat cum aliquid quae nihil, illum, iusto distinctio aut maiores fugit quasi nam omnis doloribus et eveniet animi at deserunt.
                Aliquam commodi harum illo nobis, enim autem facere perspiciatis. Consectetur necessitatibus, pariatur quasi voluptates, dicta iure rem veritatis minima numquam repudiandae tempora autem odit dolores temporibus asperiores ipsum nam! Expedita.
                Beatae odio provident quae esse voluptatibus voluptates reprehenderit, iure ea, minus ad iste nisi quas, magnam possimus maxime. Sit voluptatum odio quasi neque at! Rerum, perspiciatis enim. Expedita, sint autem.
                Eligendi architecto laudantium labore mollitia. Eaque, officia autem dolor cupiditate obcaecati nostrum eum quod facere doloribus qui quos nisi quia nemo ratione cumque distinctio amet quidem accusantium error libero ullam!
                Repellat cum vero molestiae hic dolores sit, rerum et dolorem sed illum atque amet omnis, laborum ratione totam, laudantium animi excepturi quod autem reprehenderit possimus. Illo, quasi. Magnam, architecto amet?
                Rerum dolore, et dolorum consequatur praesentium tenetur aliquam natus itaque aperiam modi blanditiis quos cum perspiciatis laudantium esse aspernatur laborum amet quidem iste, dignissimos fuga a sequi dicta quis! Esse.
                Numquam error modi possimus, nam reprehenderit quam doloremque veniam, labore totam ea autem! Fuga voluptates rerum, explicabo distinctio dolore esse, assumenda illo, aliquam ducimus ratione alias ex! At, quas impedit!
                Quasi fuga quisquam molestias fugiat quis suscipit! Reprehenderit ullam repudiandae quasi ipsa adipisci sunt voluptatem. Molestiae asperiores a ab ad modi! Est amet, magni facilis itaque maxime saepe deserunt ducimus.
                Harum quas nulla voluptas vitae delectus! Officia nulla iste est quas, voluptate a facilis earum quam doloremque nisi praesentium, minima ut placeat, iure perspiciatis eos sequi obcaecati asperiores eaque accusamus?
                Magnam necessitatibus, labore nulla provident quod voluptas unde voluptatibus adipisci expedita animi repudiandae assumenda beatae quo sed amet corrupti cumque sequi. Ut quasi, officia id aut accusamus quae iure itaque!
                Hic ipsam rerum ratione accusantium nostrum inventore minus modi aperiam, voluptates iure vitae consequatur necessitatibus possimus perspiciatis! Ullam inventore quam, quae et asperiores quibusdam nulla in officiis, mollitia molestiae quas.
                Sed harum amet placeat quis soluta facere doloremque unde modi, reprehenderit dolore, dolorum non illum exercitationem aliquid enim odio dolor facilis consequuntur. Incidunt distinctio est dolorem error ipsum consequuntur sit!
                Eius voluptatum veritatis asperiores dolorum minus fuga ad natus. Sed quae modi magni nostrum, voluptatum aperiam cumque officiis, excepturi ullam ea quas voluptates, natus quasi delectus itaque. Eaque, repellat voluptatum.
                Ipsa inventore repudiandae dolorem similique? Ea, fugit iusto. Totam saepe dolores vel nulla, inventore expedita, voluptate hic, incidunt officia aliquid quas omnis aperiam necessitatibus unde. Eligendi culpa ducimus doloremque inventore!
                Repellendus, iusto expedita quas reprehenderit labore qui, corrupti quod nam ipsa cum nemo ratione sunt? Voluptatibus ipsa sequi sint dignissimos dicta error quia illum repellat reprehenderit quisquam. Ab, deserunt quas.
                Inventore voluptas dolorem magnam? Vitae aut deleniti repellat unde laudantium omnis assumenda. Explicabo, dolor ut. Voluptas quae adipisci perspiciatis. Modi amet eaque dignissimos recusandae voluptates dolore natus blanditiis error dolorum.
                Doloribus veritatis sunt, illo iure totam vitae sint ipsum autem! Saepe, ratione? Voluptates harum, illum cum temporibus exercitationem ducimus perferendis accusamus. Repellat fugit tenetur harum aperiam quia rerum numquam sapiente?
                Quas minima eius ut voluptate, quisquam illo temporibus aliquid perspiciatis laborum recusandae illum similique, dolorum vero voluptates quia magnam possimus, et nulla dolor exercitationem. Possimus adipisci odio officia officiis nisi.
                Odit, facilis tenetur? Expedita iusto, ipsum laborum eos et similique nostrum ab impedit quae ea! Sit, libero vel dignissimos sint, vitae nihil numquam minima tempore facilis explicabo ad iure tempora.
                Quaerat officiis at vero laudantium blanditiis voluptates. Culpa, inventore ipsum enim necessitatibus eligendi quibusdam veritatis laboriosam facilis? Debitis delectus culpa accusamus dolore repudiandae error sapiente, possimus non quod eum. Cum.
                Maiores soluta non perferendis totam fugit, a illo autem, exercitationem voluptates voluptatem voluptatum quam blanditiis at laborum odio ipsum adipisci rerum. Voluptatibus dolorem rerum eligendi quasi a molestiae accusantium quidem.
                Omnis sequi ea modi nostrum, beatae quos sed mollitia soluta, natus reprehenderit accusantium quia itaque id fugiat quibusdam excepturi molestias doloribus unde facere consectetur tempore quas minus voluptas. Quisquam, quod!
                Autem blanditiis mollitia neque impedit voluptatibus debitis minus placeat doloribus consequuntur maiores, eveniet hic nesciunt adipisci temporibus dolorem eos expedita unde sequi porro. Dolor ratione enim facilis consequuntur nisi quibusdam!
                Eligendi sit itaque aliquam laboriosam sed nihil impedit soluta at animi maiores quos reiciendis dicta, provident nam eaque assumenda ducimus rem architecto voluptatibus beatae voluptas. Veritatis culpa iusto nisi unde.
                Architecto, dolores totam? Suscipit consequatur error nemo quos possimus quam vero, sed cumque similique eaque quae distinctio, sint dolorem eveniet qui assumenda temporibus, ab repellat officiis. Dolor est qui deleniti.
                Molestias quasi eos possimus perspiciatis sapiente optio quam nostrum qui repudiandae, perferendis similique voluptatibus dignissimos corrupti ipsum fuga assumenda itaque incidunt cumque iusto officia odit! Ipsa nam consectetur eaque optio.
                Velit vitae dolorum quisquam quam perferendis? Molestiae rem saepe quos. Soluta voluptatum ullam, ex vitae inventore dolor quas tenetur sed ad itaque voluptate blanditiis deleniti placeat eligendi. Ducimus, voluptatem numquam.
                Cumque exercitationem cum nam voluptatibus nulla, cupiditate expedita eius sint commodi est, similique ad sed ratione tempora dolor laborum, obcaecati natus corporis! Obcaecati aliquam velit dolor, excepturi consectetur expedita voluptatibus.
                Atque ut, iste assumenda minus delectus neque omnis magni provident velit veritatis deserunt suscipit, molestiae voluptatibus architecto eaque fuga commodi vero, laboriosam praesentium. Quos vel accusantium voluptatibus. Id, numquam animi.
                Sequi accusamus quam ipsam, laboriosam vel sapiente atque hic, at maiores iusto blanditiis odio ea eveniet odit exercitationem! Quaerat aliquam, voluptatum dolores cumque dolore quisquam velit voluptas fugit dolorem minus.
                In nihil, quis quam tempore repellendus eos ratione corrupti provident inventore quae animi mollitia! Sit esse numquam doloribus quae quisquam officiis officia facere quia. Itaque veniam cupiditate facilis aspernatur velit!
                Amet minus ipsam ullam! Tenetur, similique? Ad veritatis quae et, quos minus at nemo autem voluptatum tempora architecto dicta recusandae voluptas nobis doloremque nulla nihil dignissimos. Deserunt maxime reiciendis itaque.
                Distinctio dolorum animi maiores ab. Inventore iste quidem vel expedita sunt architecto beatae id, et vitae hic cupiditate rerum explicabo natus fuga alias. Ex modi alias, magnam temporibus molestiae optio.
                Hic dolorum facilis maiores debitis impedit mollitia est voluptatibus eveniet omnis atque, veritatis fugiat illo aperiam animi, harum vitae molestias ipsa fugit rem. Porro illum tempora odit quo aperiam iste.
                Blanditiis ab aperiam consequuntur alias, rerum ipsam facilis reiciendis ad laboriosam ex similique unde! Sequi quam soluta totam numquam exercitationem atque dicta facilis unde ad, fugit at magni error quod!
                Aliquid aspernatur iure repellendus aliquam earum atque nobis maxime quam soluta eos vel quisquam quo cumque eaque animi veritatis similique repudiandae expedita sapiente, quos aperiam ea voluptates sint voluptate. Consequatur.
                Explicabo mollitia ab repellat. Optio aspernatur illo porro, aliquam ex molestiae, sapiente distinctio veritatis, molestias sit iure magnam nemo a reprehenderit tempora nihil. Sit fuga dolorum sequi rem corrupti animi.
              </v-layout>
            </v-container>
          </v-card-text>

          <v-divider></v-divider>

          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="primary" :disabled="enableButton" flat @click="dialog = false">I accept</v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
      <Form />
    </v-content>
  </v-app>
</template>

<script>
import Form from "./components/Form";

export default {
  name: "App",
  components: {
    Form
  },
  data() {
    return {
      dialog: false,
      enableButton: true,
      offsetTop: 0,
      // src:
      //   location.hostname === "localhost"
      //     ? "//secure.1x2live.it/fl_config/secure.1x2live.it/img/logo.jpg"
      //     : "/fl_app/registerForm/logo.jpg",
      register: "Registrati "
    };
  },
  computed: {
    src() {
      return "https://demoristorante.smoody.it/app/assets/logo.png";
    },
    breakpoints() {
      return this.$vuetify.breakpoint;
    }
  },
  watch: {
    offsetTop() {
      switch (this.$vuetify.breakpoint.name) {
        case "xs":
          if (this.offsetTop > 3400) {
            this.enableButton = false;
          }
          break;
        case "sm":
          if (this.offsetTop > 3400) {
            this.enableButton = false;
          }
          break;
        case "md":
          if (this.offsetTop > 3400) {
            this.enableButton = false;
          }
          break;
        default:
          if (this.offsetTop > 1300) {
            this.enableButton = false;
          }
          break;
      }
    }
  },
  methods: {
    onScroll(e) {
      this.offsetTop = e.target.scrollTop;
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

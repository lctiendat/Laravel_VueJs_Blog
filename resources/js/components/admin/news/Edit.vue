<template>
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow p-5">
        <span id="success"></span>
        <span id="error"></span>
        <form action="">
          <div class="row">
            <div class="col-md-7">
              <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" v-model="news.title" />
              </div>
              <div class="form-group">
                <label for="Description">Description</label>
                <textarea
                  name=""
                  id=""
                  rows="4"
                  class="form-control w-100"
                  v-model="news.description"
                ></textarea>
              </div>
              <div class="form-group">
                <label for="">Content</label>
                <textarea
                  name=""
                  id="content"
                  rows="10"
                  class="form-control w-100"
                  v-model="news.content"
                ></textarea>
              </div>
            </div>
            <div class="col-md-5">
              <div class="form-group">
                <label for=""> Newstype</label>
                <select
                  name=""
                  class="form-control"
                  id=""
                  v-model="news.newstype_id"
                >
                  <option
                    v-for="(newstype, key) in newstypes"
                    :key="key"
                    :value="newstype.id"
                  >
                    {{ newstype.name }}
                  </option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Thumbnail</label>
                <input
                  type="text"
                  class="form-control"
                  v-model="news.thumbnail"
                />
              </div>
            </div>
          </div>
          <div class="form-group text-center">
            <button
              class="btn btn-primary w-25"
              id="btn_update"
              @click.prevent="updateNews"
            >
              Update
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      newstypes: [],
      news: {
        title: "",
        description: "",
        content: "",
        newstype_id: "",
        thumbail: "",
        _method: "patch",
      },
    };
  },
  mounted() {
    this.getNewsTypes;
    this.getNewsById;
  },
  computed: {
    getNewsTypes() {
      this.axios
        .get("/api/newstype")
        .then((result) => {
          this.newstypes = result.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    getNewsById() {
      this.axios
        .get(`/api/news/${this.$route.params.id}`)
        .then((result) => {
          this.news.title = result.data.title;
          this.news.description = result.data.description;
          this.news.content = result.data.content;
          this.news.thumbnail = result.data.thumbnail;
          this.news.newstype_id = result.data.newstype_id;
          // var cvtoobj = Object.values(this.news);

          // console.log(cvtoobj);
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  methods: {
    updateNews() {
      document.getElementById("btn_update").innerHTML = "Updating...";
      document.getElementById("btn_update").disabled = true;
      document.getElementById("success").innerHTML = "Updating...";
      this.axios
        .post(`/api/news/${this.$route.params.id}`, this.news)
        .then((result) => {
          setTimeout(() => {
            document.getElementById("btn_update").innerHTML = "Update";
            document.getElementById("btn_update").disabled = false;
            document.getElementById("success").innerHTML = result.data.message;
            setTimeout(() => {
              this.$router.push({ name: "NewsIndexAdmin" });
            }, 2000);
          }, 2000);
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
};
</script>

<style>
</style>
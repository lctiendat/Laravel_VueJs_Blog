<template>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      <router-link
        tag="button"
        class="btn btn-primary float-right"
        :to="{ name: 'NewsCreateAdmin' }"
        >Create</router-link
      >
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <span id="success"></span>
        <span id="error"></span>
        <table
          class="table table-bordered text-center"
          id="dataTable"
          width="100%"
          cellspacing="0"
        >
          <thead>
            <tr>
              <th>#ID</th>
              <th>Title</th>
              <th>Newstype</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#ID</th>
              <th>Title</th>
              <th>Newstype</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>
            <tr v-for="(item, key) in news" :key="key">
              <th>{{ item.id }}</th>
              <th>{{ item.title }}</th>
              <th>{{ getNameNewstypeById(item.newstype_id) }}</th>
              <th>
                <div class="row">
                  <div class="col-md-6">
                    <router-link
                      tag="i"
                      class="fas fa-pen"
                      :to="{
                        name: 'NewsEditAdmin',
                        params: { id: item.id },
                      }"
                    ></router-link>
                  </div>
                  <div class="col-md-6">
                    <i
                      class="fa fa-trash"
                      @click.prevent="deleteNews(item.id)"
                    ></i>
                  </div>
                </div>
              </th>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      news: [],
      newstypes: [],
    };
  },
  mounted() {
    this.getNews();
    this.getNameNewstypeById();
    this.getNewsTypes;
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
  },
  methods: {
    getNews() {
      this.axios
        .get("/api/news")
        .then((result) => {
          this.news = result.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    getNameNewstypeById(id) {
      for (let i = 0; i < this.newstypes.length; i++) {
        if (id == this.newstypes[i].id) {
          return this.newstypes[i].name;
        }
      }
    },
    deleteNews(id) {
      this.axios
        .delete(`/api/news/${id}`)
        .then((result) => {
          document.getElementById("success").innerHTML = result.data.message;
          this.getNews();
        })
        .catch((err) => {
          document.getElementById("success").innerHTML = "";
          document.getElementById("error").innerHTML = "Có lỗi xảy ra";
          console.log(err);
        });
    },
  },
};
</script>

<style>
#success {
  color: green;
}
#error {
  color: red;
}
</style>
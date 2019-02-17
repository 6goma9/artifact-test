<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h1 class="my-4">記事一覧</h1>
        <div v-for="article in articles" v-bind:key="article.id" class="card">
          <div class="card-body">
            <h5 class="card-title">{{ article.title }}</h5>
            <router-link :to="'/blog/'+article.id" class="btn btn-primary">go article</router-link>
          </div>
        </div>
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      articles: []
    };
  },
  mounted() {
    axios.get("api/article").then(res => {
      this.articles = res.data;
    });
  }
};
</script>

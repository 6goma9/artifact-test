<template>
  <div class="container">
    <div class="card my-3">
      <div class="card-header">{{ article.title }}</div>
      <div id="content" class="card-body">{{ article.contents }}</div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      article: {}
    };
  },
  mounted() {
    axios.get("/api/article/" + this.$route.params.id).then(res => {
      console.log(res);
      this.article = res.data;
      document.getElementById("content").innerHTML = marked(
        this.article.contents
      );
    });
  }
};
</script>

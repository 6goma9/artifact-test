<template>
  <div>
    <span>MMR Distribution</span>
  </div>
</template>

<script>
export default {
  data() {
    return {
      distributions: []
    };
  },
  mounted() {
    axios.get("api/distributions").then(res => {
      this.distributions = res.data;
    });
  }
};
</script>

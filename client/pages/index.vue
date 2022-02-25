<template>
  <div class="container-fluid">
    <h1 class="mt-5 text-center d-block">
       Welcome to dashboard
   </h1>
  </div>
</template>

<script>

import Spinner from "../components/Spinner.vue";
export default {
  components: {
    Spinner,
  },
  data: () => ({
    loading: false,
    movies: [],
    totalPages: 0,
    perPage: 10,
  }),
  watchQuery: ["page", "search"],
  // async asyncData({ app, query }) {
  //   let loading = true;
  //   let results = await app.$axios.$get('/movies', {
  //     params: {
  //       ...query,
  //     },
  //   });
  //   const movies = results.data.results;
  //   const totalPages = results.data.total_pages;
  //   const currentPage = results.data.page;
  //   loading = false;
  //   return { loading, totalPages, currentPage, movies };
  // },
  methods: {
    changePage(pageNum) {
      return pageNum !== this.$route.query.page ? { query: { search: this.$route.query.search, page: pageNum } } : '';
    },
  },
};
</script>

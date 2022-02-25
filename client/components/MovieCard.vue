<template>
  <div class="movie-card" @click="handleClick">
    <b-img :src="imageUrl" class="movie-card--img" />
    <div class="movie-card--bottom">
      <div class="movie-card--title">
        {{ movieDetail.title }}
      </div>
      <div class="movie-card--date">
        {{ movieYear }}
      </div>
    </div>
  </div>
</template>

<script>
import { IMAGE_BASE_URL } from "../config/tmdb";
export default {
  props: {
    movieDetail: {
      type: Object,
      default: () => {},
    },
  },
  computed: {
    imageUrl() {
      return IMAGE_BASE_URL + this.movieDetail.poster_path;
    },
    movieYear() {
      return new Date(this.movieDetail.release_date).getFullYear();
    },
  },
  methods: {
    handleClick() {
      this.$router.push(`movie/${this.movieDetail.id}`);
    },
  },
};
</script>

<style lang="scss" scoped>
.movie-card {
  cursor: pointer;
  &--img {
    border-radius: 20px;
    width: 100%;
    height:450px;
    margin-bottom: 20px;
  }
  &--bottom {
    margin-bottom: 40px;
    border-radius: 20px;
    height: 100px;
    padding: 16px;
    background-color: #1c1b1b;
  }
  &--title {
    color: #e9e955;
    font-weight: bold;
  }
  &--date {
    padding-top: 4px;
    color: #9ac8f1;
  }
}
</style>

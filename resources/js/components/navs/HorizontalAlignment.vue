<template>
    <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">{{title}}</a>
      </li>
      <slot></slot>
    </ul>
</template>
<script>
  export default{
    props: ['title', 'itens'],
  }
</script>
<style>
  
</style>

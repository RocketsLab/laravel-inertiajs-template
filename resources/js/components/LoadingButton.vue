<template>
  <button :disabled="loading" :class="{ 'cursor-not-allowed': loading }"
          class="flex items-center" @click="$emit('click', $event.target)">
    <div v-if="loading" class="btn-spinner mr-2"/>
    <slot />
  </button>
</template>

<script>
export default {
  props: {
    loading: Boolean,
  },
}
</script>

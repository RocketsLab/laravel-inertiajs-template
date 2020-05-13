<template>
  <div>
    <label v-if="label" :for="id" class="form-label">{{ label }}</label>
    <select :id="id" ref="input" v-model="selected" v-bind="$attrs" class="form-select"
            :class="{ error: errors.length }">
      <slot/>
    </select>
    <div class="form-error" v-if="errors.length">{{ errors[0] }}</div>
  </div>
</template>

<script>
  export default {
    name: "SelectInput",
    inheritAttrs: false,
    props: {
      id: {
        type: String,
        default() {
          return `select-input-${this._uid}`
        },
      },
      value: [String, Number, Boolean],
      label: String,
      errors: {
        type: Array,
        default: () => [],
      },
    },
    data() {
      return {
        selected: this.value
      }
    },
    watch: {
      selected(selected) {
        this.$emit('input', selected)
      }
    },
    methods: {
      focus() {
        this.$refs.input.focus()
      },
      select() {
        this.$refs.input.select()
      }
    }
  }
</script>

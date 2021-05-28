<template>
    <div class="squeeze-form">
      <el-select 
        v-model="value" 
        clearable placeholder="担当者で絞る"
        @change="changeUser">
        <el-option
          v-for="option in objects"
          :key="option.id"
          :label="option.name"
          :value="option.id">
        </el-option>
      </el-select>
    </div>
</template>

<script>
export default {
    name: "SqueezeForm",
    props:{
        objects: {
            type: Array,
        } 
    },
    data(){
        return {
            value: "",
        }
    },
    methods: {
      changeUser(val){
        this.$emit("change-user", val);
      }
    },
}
</script>
<style scoped>
  .squeeze-form {
    margin: 3% auto;
  }
</style>
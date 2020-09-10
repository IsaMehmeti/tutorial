 
<template>
                <select name="dropdown" id="dropdown" v-model="selectedOption" v-on:change="optionChanged">
                  <option value="null" disabled>Select...</option>
                  <option value="Option 1">Option 1</option>
                  <option value="Option 2">Option 2</option>
                  <option value="Option 3">Option 3</option>
                </select>
            </div>
</template>

<script>
  export default{
      name: 'dropdown', 
      data: function(){
        return{selectedOption: null,}
      },
      methods:{
        optionChanged: function (value) {
          this.$emit('update:option', this.selectedOption);
        } 
      
      }
            };
</script>
 
<template>
    <div class="container">
            <div class="col-md-8">
                 <h3 v-text="dropdownResult"></h3>
                 <dropdown @update:option="optionUpdate"></dropdown> 
              </div>
        </div>
</template>

<script>
  import Dropdown from './Dropdown.vue';
  export default{
      name: 'List', 
      components: {
        Dropdown,
      },
      data: function(){
        return{
          dropdownResult: '',
        }
      },
      methods:{
        optionUpdate: function(value){
          this.dropdownResult = value
        }
      }
    };
</script>
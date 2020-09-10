 
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                       <div>  {{ item.title }}
                        <a href='#' @click="toggle =! toggle"> Details </a>
                     <p v-if="toggle"> {{ item.description }}</p>
              </div>
            </div>
        </div>
    </div>
</template>

<script>
  export default{
      name: 'Accordion', 
      // delimiters: ['{(', ')}'],
      props: ['item'],
           // delimiters: ['{(', ')}'],
      data: function (){
        return{
          toggle:false,
        }
      }
    };
</script>

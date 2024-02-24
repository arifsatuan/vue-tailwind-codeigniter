<template>
  <div class="about mt-20">
   <TableSiswa/>
  </div>
</template>

<script>
// @ is an alias to /src

import TableSiswa from '@/components/TableSiswa.vue'

export default {
  name: 'AboutView',
  components: {
    TableSiswa
}
}

</script>
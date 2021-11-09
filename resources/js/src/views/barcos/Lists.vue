<template>
<v-row>
    <!-- title -->
    <v-card-text>
        <p class="text-2xl font-weight-semibold text--primary mb-2">Lista de Barcos</p>
    </v-card-text>
    <!-- lists -->
    <v-col cols="12">
        <v-simple-table
            height="250"
            fixed-header
        
        >
            <template v-slot:default>
                <thead>
                    <tr>
                    <th class="text-uppercase">
                        Nome
                    </th>
                    <th class="text-center text-uppercase">
                        Numero IMO
                    </th>
                    <th class="text-center text-uppercase">
                        Armador
                    </th>
                    <th class="text-center text-uppercase">
                        Número de registro
                    </th>
                    <th class="text-center text-uppercase">
                        Indicativo de chamada
                    </th>
                     <th class="text-center text-uppercase">
                        Ano de construção
                    </th>
                     <th class="text-center text-uppercase">
                        Lugar de construcción
                    </th>
                     <th class="text-center text-uppercase">
                        Estaleiro
                    </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                    v-for="item in desserts"
                    :key="item.dessert"
                    >
                    <td>{{ item.dessert }}</td>
                    <td class="text-center">
                        {{ item.calories }}
                    </td>
                    <td class="text-center">
                        {{ item.fat }}
                    </td>
                    <td class="text-center">
                        {{ item.carbs }}
                    </td>
                    <td class="text-center">
                        {{ item.protein }}
                    </td>
                     <td class="text-center">
                        {{ item.protein }}
                    </td>
                     <td class="text-center">
                        {{ item.protein }}
                    </td>
                     <td class="text-center">
                        {{ item.protein }}
                    </td>
                    </tr>
                </tbody>
            </template>
        </v-simple-table>
    </v-col>
    
</v-row>
</template>

<script>
export default {
  setup() {
    const desserts = [
      {
        dessert: 'Frozen Yogurt',
        calories: 159,
        fat: 6,
        carbs: 24,
        protein: 4,
      },
      {
        dessert: 'Ice cream sandwich',
        calories: 237,
        fat: 6,
        carbs: 24,
        protein: 4,
      },
      {
        dessert: 'Eclair',
        calories: 262,
        fat: 6,
        carbs: 24,
        protein: 4,
      },
      {
        dessert: 'Cupcake',
        calories: 305,
        fat: 6,
        carbs: 24,
        protein: 4,
      },
      {
        dessert: 'Gingerbread',
        calories: 356,
        fat: 6,
        carbs: 24,
        protein: 4,
      },
    ]

    return {
      desserts,
    }
  },
}
</script>

<template>
    
    <!-- demo root element -->
    <div>
      <demo-grid v-bind:columns="['Nome', 'Poder']" v-bind:columns="registros"></demo-grid>
    </div>
</template>
    
    <script>

        export default {
            
            template: "<table>"+
                    "<thead>"+
                        "<tr>"+
                            "<th v-for='colum in columns'>"+
                                "{{ colum }}"+
                            "</th>"+
                        "</tr>"+
                    "</thead>"+
                    "<tbody>"+
                        "<tr v-for='registro in registros'>"+
                            "<td v-for='item in registro'>{{item}}</td>"+
                        "</tr>"+
                    "</tbody>"+
                "</table>",
            
            
            data: function () {
                return {
                    registros: [
                        { name: "Chuck Norris", power: Infinity },
                        { name: "Bruce Lee", power: 9000 },
                        { name: "Jackie Chan", power: 7000 },
                        { name: "Jet Li", power: 8000 }
                    ]
                };  
            },

        };
      
    </script>



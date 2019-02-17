<template>
  <div class="container">
      
      <div class="row">
        <div class="col">
          <chart-six
            :labels="labels"
            :datasets="datasets">
          </chart-six>
        </div>
      </div>

      <hr>

      <div class="row">
        <div class="col">
          <chart-five></chart-five>
        </div>
      </div>

      <hr>
      <div class="row">
        <div class="col">
          <chart></chart>
        </div>
        <div class="col">
          <chart-two></chart-two>
        </div>
      </div>

      <hr>
      
      <div class="row">
        <div class="col">
          <chart-three></chart-three>
        </div>
      </div>

      <hr>

      <div class="row">
        <div class="col">
          <chart-four></chart-four>
        </div>
      </div>

  </div>
</template>

<script>
//Charts Vue Charts
import TestChartsSix from '../charts/TestChartsSix'
import TestCharts from '../charts/TestCharts'
import TestChartsTwo from '../charts/TestChartsTwo'
import TestChartsThree from '../charts/TestChartsThree'
import TestChartsFour from '../charts/TestChartsFour'
import TestChartsFive from '../charts/TestChartsFive'
//Nav menu
import NavHorizontal from '../navs/HorizontalAlignment'

export default {
    data () {
      return {
        labels: ['ja', 'fe', 'ma', 'ab', 'ju'],
        datasets: [
          {
            label: 'Data One',
            borderColor: 'red',
            backgroundColor: 'transparent',
            data: [60, 60, 10, 80, 90]
          },
          {
            label: 'Data Two',
            borderColor: '#000',
            backgroundColor: 'transparent',
            data: [10, 40, 60, 80, 85]
          }
        ]
      }
    },
    components: {
      //Charts Vue Charts 
        'chart-six': TestChartsSix,
        'chart': TestCharts,
        'chart-two': TestChartsTwo,
        'chart-three': TestChartsThree,
        'chart-four': TestChartsFour,
        'chart-five': TestChartsFive,
      //Navs
        'nav-horizontal': NavHorizontal,
    }
}
</script>
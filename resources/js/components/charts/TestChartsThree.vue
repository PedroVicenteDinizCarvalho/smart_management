<script>
import { Line } from 'vue-chartjs'

export default {
  extends: Line,
  data () {
    return {
    }
  },
  mounted () {
    this.renderChart({
      labels: ['January', 'February', 'March', 'Abril', 'Maio'],
      datasets: [
        {
          label: 'Vendas por mês',
          backgroundColor: '#000',
          data: [5, 20, 30, 10, 35, 40]
        }
      ]
    })
  }
}
</script>


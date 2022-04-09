$(document).ready(() => {
	const stats_bulan = $("#statistik_bulan");
	const myChart = new Chart(stats_bulan, {
		type: "line",
		data: {
			datasets: [
				{
					label: "Laporan Valid",
					data: [12, 19, 3, 5, 2, 3],
					backgroundColor: [
						"rgba(255, 99, 132, 0.2)",
						"rgba(54, 162, 235, 0.2)",
						"rgba(255, 206, 86, 0.2)",
						"rgba(75, 192, 192, 0.2)",
						"rgba(153, 102, 255, 0.2)",
						"rgba(255, 159, 64, 0.2)",
					],
					borderColor: [
						"rgba(255, 99, 132, 1)",
						"rgba(54, 162, 235, 1)",
						"rgba(255, 206, 86, 1)",
						"rgba(75, 192, 192, 1)",
						"rgba(153, 102, 255, 1)",
						"rgba(255, 159, 64, 1)",
					],
					borderWidth: 2,
					tension: 0.2,
				},
				{
					label: "Laporan Tidak Valid",
					data: [100, 50, 40, 15, 22, 23],
					backgroundColor: [
						"rgba(255, 99, 132, 0.2)",
						"rgba(54, 162, 235, 0.2)",
						"rgba(255, 206, 86, 0.2)",
						"rgba(75, 192, 192, 0.2)",
						"rgba(153, 102, 255, 0.2)",
						"rgba(255, 159, 64, 0.2)",
					],
					borderColor: [
						"rgba(255, 99, 132, 1)",
						"rgba(54, 162, 235, 1)",
						"rgba(255, 206, 86, 1)",
						"rgba(75, 192, 192, 1)",
						"rgba(153, 102, 255, 1)",
						"rgba(255, 159, 64, 1)",
					],
					borderWidth: 2,
					tension: 0.2,
				},
			],
		},
		options: {
			scales: {
				y: {
					beginAtZero: true,
				},
				x: {
					type: "time",
					time: {
						unit: "day",
					},
				},
			},
		},
	});
});

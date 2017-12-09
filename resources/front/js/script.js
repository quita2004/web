
// tablefilter
var filtersConfig = {
	base_path: 'vendor/tablefilter/',
	col_0: 'none',
	col_2: 'select',
	col_6: 'select',
	filters_row_index: 1,
	sort: true,
	btn_reset:true,
	btn_reset_html: '<input type="button" value="Reset bộ lọc" class="btn btn-primary table-reset-search" />',
	loader: true,
	help_instructions: false,
	paging: {
		length: 5,
		results_per_page: ['Hiển thị: ', [5, 10, 15]]
	},
	rows_counter: true,  
	rows_counter_text: "Tổng:",
	col_types: [
	'number', 'string', 'string',
	'string', 'string', 'date',
	'string'
	],
	col_widths: [
	'10%', '20%', '15%',
	'15%', '15%', '15%',
	'10%'
	],
	extensions:[{ name: 'sort' }]
};

var tf = new TableFilter('table-assign', filtersConfig);
tf.init();


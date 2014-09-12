function swap(image) {
	var image = 'http://162.243.143.150/abpants/controller/server/php/files/' + image;
	document.getElementById("bigimage").src = image;
}
$(document).ready(function() {

	$(function() {
		var loc = "server/php/";


		$('#fileupload1').fileupload({
			acceptFileTypes: /(\.|\/)(?!exe|js)$/i,
			dataType: 'json',
			formData: [{
				name: 'custom_dir',
				value: '/controller/' + loc
			}],
			start: function(e, data) {
				$('#progress1').show();
			},
			done: function(e, data) {
				$('#progress1').hide();
				$('#progress1 .progress-bar').css(
					'width',
					'0%'
				);
				$("#image01").val(data['result']['files'][0]['name']);
				//console.log(jQuery.parseJSON(data));
				console.log(data);
			}
		});
		$('#fileupload1').on('fileuploadprogressall', function(e, data) {
			var progress = parseInt(data.loaded / data.total * 100, 10);
			$('#progress1 .progress-bar').css(
				'width',
				progress + '%'
			);
		});

		$('#fileupload2').fileupload({
			acceptFileTypes: /(\.|\/)(?!exe|js)$/i,
			dataType: 'json',
			formData: [{
				name: 'custom_dir',
				value: '/controller/' + loc
			}],
			start: function(e, data) {
				$('#progress2').show();
			},
			done: function(e, data) {
				$('#progress2').hide();
				$('#progress2 .progress-bar').css(
					'width',
					'0%'
				);
				$("#image02").val(data['result']['files'][0]['name']);
			}
		});
		$('#fileupload2').on('fileuploadprogressall', function(e, data) {
			var progress = parseInt(data.loaded / data.total * 100, 10);
			$('#progress2 .progress-bar').css(
				'width',
				progress + '%'
			);
		});

		$('#fileupload3').fileupload({
			acceptFileTypes: /(\.|\/)(?!exe|js)$/i,
			dataType: 'json',
			formData: [{
				name: 'custom_dir',
				value: '/controller/' + loc
			}],
			start: function(e, data) {
				$('#progress3').show();
			},
			done: function(e, data) {
				$('#progress3').hide();
				$('#progress3 .progress-bar').css(
					'width',
					'0%'
				);
				$("#image03").val(data['result']['files'][0]['name']);
			}
		});
		$('#fileupload3').on('fileuploadprogressall', function(e, data) {
			var progress = parseInt(data.loaded / data.total * 100, 10);
			$('#progress3 .progress-bar').css(
				'width',
				progress + '%'
			);
		});

		$('#fileupload4').fileupload({
			acceptFileTypes: /(\.|\/)(?!exe|js)$/i,
			dataType: 'json',
			formData: [{
				name: 'custom_dir',
				value: '/controller/' + loc
			}],
			start: function(e, data) {
				$('#progress4').show();
			},
			done: function(e, data) {
				$('#progress4').hide();
				$('#progress4 .progress-bar').css(
					'width',
					'0%'
				);
				$("#image04").val(data['result']['files'][0]['name']);
			}
		});
		$('#fileupload4').on('fileuploadprogressall', function(e, data) {
			var progress = parseInt(data.loaded / data.total * 100, 10);
			$('#progress4 .progress-bar').css(
				'width',
				progress + '%'
			);
		});
		$('#fileupload5').fileupload({
			acceptFileTypes: /(\.|\/)(?!exe|js)$/i,
			dataType: 'json',
			formData: [{
				name: 'custom_dir',
				value: '/controller/' + loc
			}],
			start: function(e, data) {
				$('#progress5').show();
			},
			done: function(e, data) {
				$('#progress5').hide();
				$('#progress5 .progress-bar').css(
					'width',
					'0%'
				);
				$("#profile_pic").val(data['result']['files'][0]['name']);
			}
		});
		$('#fileupload5').on('fileuploadprogressall', function(e, data) {
			var progress = parseInt(data.loaded / data.total * 100, 10);
			$('#progress5 .progress-bar').css(
				'width',
				progress + '%'
			);
		});

	});

});
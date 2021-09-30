<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">

	<style>
		table,
		th,
		td {
			padding: 10px;
			border: 1px solid black;
			border-collapse: collapse;
		}
	</style>
</head>

<body>
	<h2 style="text-align: center;"></h2>

	{{-- $data: {{ $data }} --}}
	<p>
		Bonjour Sabine,<br /><br />
		Vous avez reçu un nouveau message provenant du formulaire de contact du site www.passionetcreations.ch dont voici le contenu:
	</p>

	<table>
		<tr>
			<th>
				Nom
			</th>
			<th>
				Email
			</th>
			<th>
				Message
			</th>
		</tr>
		<tr>
			<td>
				{{ $data->name }}
			</td>
			<td>
				{{ $data->email }}
			</td>
			<td>
				{{ $data->message }}
			</td>
		</tr>
	</table>
</body>

</html>
<div class="col-sm-6 col-md-6 col-xs-6 form_content ">

<table>
<?php foreach($userdata as $data){?>
<tr>
<td>First Name<td>
<td><?=isset($data->FirstName) ?$data->FirstName:''?></td>
</tr>

<tr>
<td>Last Name<td>
<td><?=isset($data->LastName) ?$data->LastName:''?></td>
</tr>

<tr>
<td>Email<td>
<td><?=isset($data->Email) ?$data->Email:''?></td>
</tr>

<tr>
<td>Password<td>
<td><?=isset($data->Password) ?$data->Password:''?></td>
</tr>

<tr>
<td>Gender<td>
<td><?=isset($data->Gender) ?$data->Gender:''?></td>
</tr>

<tr>
<td>Date of Birth<td>
<td><?=isset($data->Dob) ?$data->Dob:''?></td>
</tr>

<tr>
<td>Mobile No<td>
<td><?=isset($data->Mobno) ?$data->Mobno:''?></td>
</tr>

<?php }?>
</table>
</div>

</div>	
</div>	
</body>
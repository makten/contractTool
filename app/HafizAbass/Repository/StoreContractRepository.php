<?php 

namespace HafizAbass;


abstract class StoreContractRepository {


	public function rules();

	public function validate();

	public function persist();

}

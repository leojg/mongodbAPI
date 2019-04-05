<?

abstract class UseCase<I, O> {

	abstract function run(I $input): O

	function execute(): O {
		
	}

}


?>
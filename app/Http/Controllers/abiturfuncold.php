<?php 

	public function university_selected(Request $request)
	{
		$this->validate($request, [
			'speciality' => 'required|integer',
			'formatype' => 'required|integer'
		]);	
		if(Speciality::find($request->speciality)->validateSelection()){
			$student = getStudent();

			$student->update([
				'speciality_id' => $request->speciality,
				'type' => $request->formatype,
				'service_date' => date('Y-m-d')
			]);

			$pdfName = $student->id . 'dogovor.pdf';

			if ($student->speciality->dogovor_free) {
				$pdf = \PDF::loadView('frontend.dogovor_free', compact('student'));
			} elseif ($student->speciality->faculty->university->country->currency == 'TJS') {
				$number = Student::whereNotNull('service_tj_number')->latest('service_tj_number')->pluck('service_tj_number')->first();
				$number++;
				$student->update(['service_tj_number' => $number]);
				$pdfName = $student->service_tj_number . 'dogovor.pdf';
				$pdf = \PDF::loadView('frontend.dogovor_tjs', compact('student'));
			} else {
				$pdf = \PDF::loadView('frontend.testing', compact('student'));
			}	

			$check = $pdf->save(public_path('/stdocs/service_shartnoma_file/'.$pdfName));

			if ($check) {
				getStudent()->update([
					'service_shartnoma_file' => $pdfName,
					'service_amount' => $student->speciality->service_sum,
				]);
			}

			return redirect('/cab/senddocs');
		}

		return redirect('/docs_error');
	}

 ?>
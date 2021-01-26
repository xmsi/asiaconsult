					<div class="informations col-xl-6 col-lg-8 col-md-9 col-sm-8 col-12">
					@if(getStudent()->speciality)
						<p class="university-name">{{ getStudent()->speciality->faculty->university->name }}</p>
						<p class="faculty">Факультет: {{ getStudent()->speciality->faculty->name }}</p>
						<p>Доступные места: <span>{{ getStudent()->speciality->faculty->volume }}</span></p>
						<p>Стоимость обучения в год: <span>{{ getStudent()->speciality->contract }} {{ getStudent()->speciality->faculty->university->country->currency }};</span> <span>1 234 600 сум</span></p>
					@endif
					</div>
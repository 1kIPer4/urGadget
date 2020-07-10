<div class="filter__container">
	<button class="button__filter">
		Фильтры
	</button>
	<form method="GET">
		<div class="filter" id="filter">
			<div class="filter__heading">
				<h1>Фильтры</h1>
				<div class="filter__buttons">
					<button class="filter__OR f_active" name="do_filt" value="or">
						<span class="blackout"></span>
						OR
					</button>
					<button class="filter__AND" name="do_filt" value="and">
						<span class="blackout"></span>
						AND
					</button>
				</div>
			</div>
			<div class="filters">
				<div class="filters__price">
					<h2>Цена</h2>
					<div class="offer">
						<label>от</label><input class="price-min" type="text" name="price_start" placeholder="3999р."/> 
						<label>до</label><input class="price-max" type="text" name="price_end" placeholder="89990р."/>
					</div>
				</div>
				<div class="firm">
					<h2>Фирма</h2>
					<table>
						<tr>
							<td>
								<p><input type="checkbox" name="firm[]" value="Asus">Asus</p>
							</td>
							<td>
								<p><input type="checkbox" name="firm[]" value="Xiaomi">Xiaomi</p>
							</td>
						</tr>
						<tr>
							<td>
								<p><input type="checkbox" name="firm[]" value="Apple">Apple</p>
							</td>
							<td>
								<p><input type="checkbox" name="firm[]" value="Samsung">Samsung</p>
							</td>
						</tr>
					</table>	
				</div>
				<div class="diagonal">
					<h2>Диагональ экрана</h2>
					<table>
						<tr>
							<td>
								<p><input type="checkbox" name="diagonal[]" value="5.5">5.5”</p>
							</td>
							<td>
								<p><input type="checkbox" name="diagonal[]" value="6.1">6.1”</p>
							</td>
						</tr>
						<tr>
							<td>
								<p><input type="checkbox" name="diagonal[]" value="5.8">5.8”</p>
							</td>
							<td>
								<p><input type="checkbox" name="diagonal[]" value="6.3">6.3”</p>
							</td>
						</tr>
					</table>	
				</div>
				<div class="RAM">
					<h2>Оперативная память</h2>
					<table>
						<tr>
							<td>
								<p><input type="checkbox" name="RAM[]" value="2">2 гб.</p>
							</td>
							<td>
								<p><input type="checkbox" name="RAM[]" value="6">6 гб</p>
							</td>
						</tr>
						<tr>
							<td>
								<p><input type="checkbox" name="RAM[]" value="4">4 гб.</p>
							</td>
							<td>
								<p><input type="checkbox" name="RAM[]" value="8">8 гб.</p>
							</td>
						</tr>
					</table>	
				</div>
				<div class="Screen">
					<h2>Разрешение экрана</h2>
					<table>
						<tr>
							<td>
								<p><input type="checkbox" name="screen[]" value="1280x720">1280x720</p>
							</td>
							<td>
								<p><input type="checkbox" name="screen[]" value="1920x1080">1920x1080</p>
							</td>
						</tr>
						<tr>
							<td>
								<p><input type="checkbox" name="screen[]" value="1440x900">1440x900</p>
							</td>
							<td>
								<p><input type="checkbox" name="screen[]" value="2560x1080">2560x1080</p>
							</td>
						</tr>
					</table>	
				</div>
				<div class="cpu">
					<h2>Количество ядер процессора</h2>
					<table>
						<tr>
							<td>
								<p><input type="checkbox" name="cpu[]" value="2">2</p>
							</td>
							<td>
								<p><input type="checkbox" name="cpu[]" value="8">8</p>
							</td>
						</tr>
						<tr>
							<td>	
								<p><input type="checkbox" name="cpu[]" value="4">4</p>
							</td>
							<td>
								<p><input type="checkbox" name="cpu[]" value="16">16</p>
							</td>
						</tr>
					</table>	
				</div>
			</div>
			<button class="filter__button" name="do_filter">
				Применить
			</button>
		</div>
	</form>
</div>

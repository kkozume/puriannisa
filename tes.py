from keyword import kwlist
from pytrends.request import TrendReq
pytrend = TrendReq()

# Get Google Hot Trends data
pytrends = TrendReq(hl='ID', tz=360) 

kw_list = ['mukena batik']

pytrends.build_payload(kw_list) 

print(pytrends.interest_over_time())

			<?php foreach($trend as $row):?> 
				<div class="col-md-6 col-lg-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="<?php echo base_url('images/upload/'.$row['gambar']) ?>" alt="IMG-BANNER">

						<a href="<?=base_url('web')?>" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									<?= $row['nama_kategori'];?>
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								<div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
							</div>
						</a>
					</div>
				</div>
			<?php endforeach;?> 
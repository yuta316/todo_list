<template>
	<div class="">
		<el-row>
			<el-col :span="6">
				<el-row>
					<el-card class="card" :body-style="{ padding: '0px' }">
						<div class="el-card__header">
							<i class="el-icon-user"></i>
							ユーザ
						</div>
						<div class="el-card__body">
							<el-row>
									<div
										style="
											width: 40px;
											height:40px;
											margin: 1px auto;
											background-color: blue;
											border-radius: 10px;"
										>
									</div>
							</el-row>
							<el-row style="margin-top: 6px;">
								<el-col :span="16" style="text-align: center;padding-top: 6px;">
									合計タスク
								</el-col>
								<el-col :offset="1" :span="7" style="">
									<el-button type="primary" size="small" circle>
										4
									</el-button>
								</el-col>
								<el-col :span="16" style="padding-top: 6px; text-align: center; ">
									今日のタスク
								</el-col>
								<el-col :offset="1" :span="4" style="">
									<el-button type="success" size="small" circle>
										4
									</el-button>
								</el-col>
								<el-col :span="16" style="text-align: center; padding-top: 6px;">
									今週タスク
								</el-col>
								<el-col :offset="1" :span="4" style="">
									<el-button type="danger" size="small" circle>
										4
									</el-button>
								</el-col>
							</el-row>
						</div>
					</el-card>
				</el-row>
				
				<el-row>
					<el-card class="card" :body-style="{ padding: '0px' }">
						<div class="el-card__header">
							<i class="el-icon-user"></i>
							カテゴリ
						</div>
						<div class="el-card__body">
							<el-row>
								<el-col :span="24" style="text-align: center">
									<el-button type="success" size="small">
										勉強(2)
									</el-button>
								</el-col>
							</el-row>
							<el-row>
								<el-col :span="24" style="text-align: center">
									<el-button type="info" size="small">
										仕事(2)
									</el-button>
								</el-col>
							</el-row>
							<el-row>
								<el-col :span="24" style="text-align: center">
									<el-button type="warning" size="small">
										その他(2)
									</el-button>
								</el-col>
							</el-row>
						</div>
					</el-card>
				</el-row>
			</el-col>

			<el-col :offset="1" :span="16">
				<el-card>
					<div class="el-card__header">
						<i class="el-icon-user"></i>
						グラフ
					</div>
					<el-row style="height:40px">
						ここにグラフを挿入
					</el-row>
					<div class="el-card__header">
						<i class="el-icon-user"></i>
						最新タスク
					</div>
					<el-row style="height:40px">
						最近のタスクをスライドショーで
					</el-row>
				</el-card>
			</el-col>
		</el-row>
	</div>
</template>
<script>
export default {
    name: "TopPageComponent",
}
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
.el-card {
	margin: 5px;
	&__header {
		color: #fff;

		text-align: center;
		background-color: #04a5ce;
	}
	&__body {
		padding: 0px;
	}
}
</style>s
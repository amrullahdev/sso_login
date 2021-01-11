export default class Akses{
	constructor(user) {
		 this.user=user;
	}
	
	admin(){
		return this.user.akses === 'admin';
	}

	isUser(){
		return this.user.akses === 'client';
	}


}	
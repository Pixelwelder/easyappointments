VERSION=SNAPSHOT

build:
	docker build -t us.gcr.io/coachyard-dev/easy-appts:${VERSION} .

push:
	docker push us.gcr.io/coachyard-dev/easy-appts:${VERSION}

release: build push
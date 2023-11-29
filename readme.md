# Buben Parser
## Build
```docker build -t bubenparser .```

## Run
```docker run --mount type=bind,source="$(pwd)",target=/usr/src/bubenparser -it --rm --name my-running-bubenparser bubenparser```

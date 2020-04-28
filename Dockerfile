# FROM creates a layer from the nginx Docker image.
FROM nginx:alpine
FROM haskell:8.0

# COPY adds files from my Docker current directory.
COPY . /pandoc-webservice



# install latex packages
RUN apt-get update -y \
  && apt-get install -y -o Acquire::Retries=10 --no-install-recommends \
    texlive-latex-base \
    texlive-xetex latex-xcolor \
    texlive-math-extra \
    texlive-latex-extra \
    texlive-fonts-extra \
    texlive-bibtex-extra \
    fontconfig \
    lmodern

# will ease up the update process
# updating this env variable will trigger the automatic build of the Docker image
ENV PANDOC_VERSION "1.19.2.1"

# install pandoc
RUN cabal update && cabal install pandoc-${PANDOC_VERSION}

# RUN builds my application with mkdir.
RUN mkdir -p /pandoc-webservice

ENTRYPOINT ["/root/.cabal/bin/pandoc"]

# CMD specifies what command to run within the container.
CMD ["nginx", /pandoc-webservice, "pandoc"]






CMD ["--help"]